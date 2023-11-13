<?php
  session_start();

  require_once("../classes/API.php");

  $obj = new API();

  $nome = $_POST["txtNome"];
  $nomePreferencial = $_POST["txtNomePreferencial"];
  $documento = $_POST["txtCPF"];
  $dataNascimento = $_POST["dtDataNascimento"];
  $email = $_POST["txtEmail"];

  $data = [
    "nome" => $nome,
    "nome_preferencial" => $nomePreferencial,
    "documento" => $documento,
    "data_nascimento" => $dataNascimento,
    "email" => $email
  ];

  $retorno = $obj->createUser($_SESSION["token"], $data);
  
  if(gettype($retorno) == 'string') {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(["erro" => $retorno]);
  } else {
    header('HTTP/1.1 200 OK');
    echo json_encode($retorno);
  }
?>