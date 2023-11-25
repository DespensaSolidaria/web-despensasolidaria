<?php
  session_start();

  require_once("../classes/API.php");

  $obj = new API();

  $tipoDespensa = $_POST["slTipoDespensa"];
  $descricao = $_POST["txtDescricao"];
  $cep = $_POST["txtCEP"];
  $logradouro = $_POST["txtLogradouro"];
  $numero = $_POST["txtNumero"];
  $bairro = $_POST["txtBairro"];
  $cidade = $_POST["txtCidade"];
  $uf = $_POST["txtUF"];
  $complemento = $_POST["txtComplemento"];
  $referencia = $_POST["txtReferencia"];

  $data = [
    "tipo_ponto_doacao" => $tipoDespensa,
    "logradouro" => $logradouro,
    "numero" => $numero,
    "complemento" => $complemento,
    "bairro" => $bairro,
    "cidade" => $cidade,
    "uf" => $uf,
    "cep" => $cep,
    "referencia_endereco" => $referencia,
    "descricao" => $descricao
  ];

  $retorno = $obj->createDonatePoint($_SESSION["token"], $data);
  
  if(gettype($retorno) == 'string') {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(["erro" => $retorno]);
  } else {
    header('HTTP/1.1 200 OK');
    echo json_encode($retorno);
  }
?>