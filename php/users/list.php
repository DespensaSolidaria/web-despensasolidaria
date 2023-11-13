<?php
  session_start();

  require_once("../classes/API.php");

  $obj = new API();

  $di = isset($_POST["dtDataInicial"]) ? $_POST["dtDataInicial"] : "";
  $df = isset($_POST["dtDataFinal"]) ? $_POST["dtDataFinal"] : "";
  $nome = isset($_POST["txtNome"]) ? $_POST["txtNome"] : "";
  $documento = isset($_POST["txtCPF"]) ? $_POST["txtCPF"] : "";

  $data = [
    "di" => $di,
    "df" => $df,
    "nome" => $nome,
    "documento" => $documento
  ];

  if((strtotime($di) > strtotime("3000-01-01")) || (strtotime($df) > strtotime("3000-01-01"))) {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(["erro" => 'Data inválida!']);
    exit;
  }

  $retorno = $obj->listUsers($_SESSION["token"], $data);
  
  if(gettype($retorno) == 'string') {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(["erro" => $retorno]);
  } else {
    header('HTTP/1.1 200 OK');
    echo json_encode($retorno);
  }
?>