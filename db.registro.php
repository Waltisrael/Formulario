<?php

class db
{

  private $host = 'localhost';
  private $usuario = 'root';

  private $senha = '';

  private $database = 'db_cadastro_cliente';

  public function conecta_mysql()
  {

    $con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);
    mysqli_set_charset($con, 'utf8');

    if (mysqli_connect_errno()) {
      echo 'Erro ao tentar se conectar com o BD Mysql' . mysqli_connect_error();
    }

    return $con;
  }
}
?>