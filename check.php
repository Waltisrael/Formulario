<?php
  
  session_start();
  if(!isset($_SESSION['logado'])){
    header("location: http://localhost/formulario/login.php");
    session_destroy();
    
  }

?>
