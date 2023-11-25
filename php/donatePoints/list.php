<?php
  session_start();

  require_once("../classes/API.php");

  $obj = new API();

  $di = isset($_POST["dtDataInicial"]) ? $_POST["dtDataInicial"] : "";
  $df = isset($_POST["dtDataFinal"]) ? $_POST["dtDataFinal"] : "";
  $tipoDespensa = isset($_POST["slTipoDespensa"]) ? $_POST["slTipoDespensa"] : "";

  if($tipoDespensa == "T")
    $tipoDespensa = "";

  $data = [
    "di" => $di,
    "df" => $df,
    "tipoPontoDoacao" => $tipoDespensa
  ];

  if((strtotime($di) > strtotime("3000-01-01")) || (strtotime($df) > strtotime("3000-01-01"))) {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(["erro" => 'Data inválida!']);
    exit;
  }

  $retorno = $obj->listDonatePoints($_SESSION["token"], $data);
  
  if(gettype($retorno) == 'string') {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(["erro" => $retorno]);
  } else {
    header('HTTP/1.1 200 OK');
    echo json_encode($retorno);
  }
?>