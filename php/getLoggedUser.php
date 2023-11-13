<?php
  session_start();

  require_once("./classes/API.php");

  $obj = new API();

  $retorno = $obj->getLoggedUser($_SESSION["token"]);
  
  if(gettype($retorno) == 'string') {
    header('HTTP/1.1 400 Bad retornouest');
    echo json_encode(["erro" => $retorno]);
  } else {
    header('HTTP/1.1 200 OK');
    echo json_encode($retorno);
  }
?>