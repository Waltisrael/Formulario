<?php

include_once('db.registro.php');
$objDb = new db();
$link = $objDb->conecta_mysql();

if (!empty($_GET['id'])) {

  include_once('db.registro.php');
	
  $id = $_GET['id'];

	$sqlSelect = "SELECT * FROM cadastro_clientes WHERE id = $id";
  
  $result = $link->query($sqlSelect);


  if($result->num_rows > 0)
  {
      $sqlDelete = "DELETE FROM cadastro_clientes WHERE id='$id'";
      $result = $link->query($sqlDelete);

  }
}
header('location: listagem.php');
