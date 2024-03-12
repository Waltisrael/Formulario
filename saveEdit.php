<?php

include_once('db.registro.php');

$objDb = new db();
$link = $objDb->conecta_mysql();


if (isset($_POST['update'])) {
  
  $id = $_POST['id'];
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


  $sqlUpdate= "UPDATE cadastro_clientes SET nome_cliente='$usuario',tipo_cliente='$tipo',doc_cliente='$doc',rg_cliente='$rg',city_cliente='$city',estado_cliente='$estado',bairro_cliente='$bairro',rua_cliente='$rua',numero_cliente='$numero',tel_cliente='$tel',email_cliente='$email' 
  WHERE id= '$id'";


  $result = $link->query($sqlUpdate);
}

header('location: listagem.php');
