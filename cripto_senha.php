<?php

  $pass = "pass_cliente";

  $senha_cripto = password_hash($pass, PASSWORD_DEFAULT);

  if(password_verify('pass_cliente', $pass)){

  } else {
    
  }






?>