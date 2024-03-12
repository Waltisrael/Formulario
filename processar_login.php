<?php
require_once('db.registro.php');

$objDb = new db();
$link = $objDb->conecta_mysql();


if (!empty($_POST['email_cliente']) && !empty($_POST['pass_cliente'])) {

    $email = $_POST['email_cliente'];
    $pass = $_POST['pass_cliente'];
  


    $sql = "SELECT * FROM cadastro_clientes WHERE email_cliente = '$email'";
    $lista = mysqli_query($link, $sql);
    $result = mysqli_fetch_assoc($lista);
   
    //Verificação de existencia de cliente no banco.
    if (!empty($result)) {
      
        //verificação de senha digitada com a senha hash
        
        if (password_verify("$pass", $result['pass_cliente'])) {
            session_start();
            $_SESSION['id'] = $result['id'];
            $_SESSION['nome'] = $result['nome_cliente'];
            $_SESSION['logado'] = true;
            

            echo json_encode([
                "result" => true,
                "message" => "Usuário logado com sucesso"
            ]);
        } else {
            echo json_encode([
                "result" => false,
                "message" => "Falha ao logar! E-mail ou senha incorretos"
            ]);
        }
    } else {
        echo json_encode([
            "result" => false,
            "message" => "Falha ao logar! Usuário não encontrado"
        ]);
    }
} else {
    echo json_encode([
        "result" => false,
        "message" => "Por favor, forneça e-mail e senha"
    ]);
}
