<?php
  session_start();

  require_once("../classes/API.php");

  $obj = new API();

  $donatePointId = $_POST["donatePointId"];
  
  $retorno = $obj->getDonatePointById($_SESSION["token"], $donatePointId);

  if(gettype($retorno) == 'string') {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(["erro" => $retorno]);
  } else {
    header('HTTP/1.1 200 OK');
    echo json_encode($retorno);
  }
?>