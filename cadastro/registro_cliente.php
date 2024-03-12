<?php

require_once('../db.registro.php');


$usuario = $_POST['nome_cliente'];
$tipo = $_POST['tipo_cliente'];
$doc = $_POST['doc_cliente'];
$rg = $_POST['rg_cliente'];
$city = $_POST['city_cliente'];
$estado = $_POST['estado_cliente'];
$bairro = $_POST['bairro_cliente'];
$rua = $_POST['rua_cliente'];
$numero = $_POST['numero_cliente'];
$tel = $_POST['tel_cliente'];
$email = $_POST['email_cliente'];
$pass = $_POST['pass_cliente'];
$obs = $_POST['obs_cliente'];

$objDb = new db();
$link = $objDb->conecta_mysql();
//link de conexão com o banco de dados

$senha_hash = password_hash($pass, PASSWORD_DEFAULT);


$sql = "INSERT INTO cadastro_clientes(nome_cliente, tipo_cliente, doc_cliente, rg_cliente, city_cliente, estado_cliente, bairro_cliente, rua_cliente, numero_cliente, tel_cliente, email_cliente, pass_cliente, obs_cliente) 
VALUES ('$usuario', '$tipo', '$doc', '$rg', '$city', '$estado', '$bairro', '$rua', '$numero', '$tel', '$email', '$senha_hash' , '$obs')";


if (mysqli_query($link, $sql)) {
echo "<h1>Usuário cadastrado com sucesso</h1>";
} else {
echo "Erro ao cadastrar o usuário!";
}

?>

<script>
  alert("Cadastrado com sucesso!")
  window.location.assign("http://localhost/Formulario/listagem.php")
</script>

