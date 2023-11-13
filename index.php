<?php
	session_start();

	if(isset($_SESSION["token"]) || !empty($_SESSION["token"]))
	{
		header("Location: ./home");
	}

?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Despensa Solidária</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

    <link rel="icon" href="./img/logo2.png">
    <link rel="stylesheet" href="./materialize/css/materialize.min.css">
    <link rel="stylesheet" href="./css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./materialize/js/materialize.min.js"></script>
  </head>
  <body class="despensasolidaria-login-bg">
    <div class="despensasolidaria-login-bg-overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col s12 m12 l5 center-align">
          <div class="card-panel despensasolidaria-login-card">
            <form action="./php/login" class="form-login" method="post">
              <div class="row">
                <a href="https://despensasolidaria.com.br" target="_blank">
                  <img class="responsive-img" src="./img/logo.jpeg" alt="Logotipo da Despensa Solidária." width="55%" height="55%">
                </a>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="txtEmail" name="txtEmail" type="email" class="validate">
                  <label for="txtEmail">E-mail</label>
                </div>
                <div class="input-field col s12 mb-0">
                  <input id="pwdSenha" name="pwdSenha" type="password" class="validate">
                  <label for="pwdSenha">Senha</label>
                </div>
              </div>
              <button type="submit" class="waves-effect waves-light btn-large despensasolidaria-primary despensasolidaria-btn-block" >Entrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>