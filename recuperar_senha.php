<?php


require_once('db.registro.php');


$objDb = new db();
$link = $objDb->conecta_mysql();

if (!empty($_POST['email_cliente'])) {

  $email = $_POST['email_cliente'];



  $sql = "SELECT * FROM cadastro_clientes WHERE email_cliente = '$email'";
  $lista = mysqli_query($link, $sql);
  $result = mysqli_fetch_assoc($lista);

  if (!empty($result)) {
      // Gerar um token exclusivo para a sessão de redefinição de senha
      session_start();
      $token = bin2hex(random_bytes(32));
      $_SESSION['reset_token'] = $token;
      $_SESSION['reset_email'] = $email;

      header("Location: redefinir_senha.php");
      exit();

} else {
  echo "E-mail não encontrado.";
}
} 
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="senha.css">
  <title>Recuperar senha </title>
</head>

<body>
  <h1>Recuperar Senha</h1>
  <h3>Digite o seu e-mail de acesso para recuperação:</h3>
    <form method="POST" id="login">
        <label for="username">E-mail:</label>
        <input type="text" id="username" name="email_cliente" placeholder="Digite seu e-mail" value= "<?php if(isset($dados['email_cliente'])){ echo $dados['email_cliente']; }?>"><br><br>
       
          <input type="submit" value= "Recuperar" name= "SendRecupSenha">
    
    </form>
</body>

</html>