<?php
  session_start();

  require_once("./classes/API.php");

  $obj = new API();

  $email = $_POST["txtEmail"];
  $senha = $_POST["pwdSenha"];

  $retorno = $obj->login($email, $senha);
  
  if(gettype($retorno) == 'string') {
    echo '<link rel="stylesheet" href="../materialize/css/materialize.min.css">';  
    echo '<link rel="stylesheet" href="../css/style.css">';
    echo '<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
    echo '<script src="../materialize/js/materialize.min.js"></script>';
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
    echo "<div><script>Swal.fire({ icon: 'error', title: 'Oops...', confirmButtonColor: '#edb264', buttonsStyling: true, text: '".$retorno."' }).then((result) => {window.location.href = '../index'})</script></div>";
  } else {
    $_SESSION["token"] = $retorno->token;
    $obj->getLoggedUser($retorno->token);
    header("Location: ../home");
  }
?>