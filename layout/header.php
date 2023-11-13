<?php
  session_start();

	if(!isset($_SESSION["token"]) || empty($_SESSION["token"])) {
    header("Location: ./");
  }

  require_once("php/classes/API.php");

  $obj = new API();

  $loggedUser = $obj->getLoggedUser($_SESSION["token"]);

	if(gettype($loggedUser) == 'string') {
    echo '<link rel="stylesheet" href="./materialize/css/materialize.min.css">';  
    echo '<link rel="stylesheet" href="./css/style.css">';
    echo '<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>';
    echo '<script src="./materialize/js/materialize.min.js"></script>';
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
    echo "<div><script>Swal.fire({ icon: 'error', title: 'Oops...', confirmButtonColor: '#edb264', buttonsStyling: true, text: '".$loggedUser."' }).then((result) => {window.location.href = './php/logout'})</script></div>";
    exit();
  }
   
  $minDate = date_create('01/01/1984');
  $maxDate = date_create('01/01/3000');
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Despensa Solidária</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="icon" href="img/logo2.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="./materialize/css/materialize.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <?php include 'css/style.php'; ?>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/jquery.mask.js"></script>
    <script src="./materialize/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./js/functions.js"></script>
    <script src="./js/header.js"></script>
  </head>
  <body>
    <div class="navbar-fixed no-print">
      <nav>
        <div class="nav-wrapper">
          <a href="#!" class="brand-logo right">
            <img class="despensasolidaria-side-logo" src="./img/logo2.png" alt="Logotipo da Despensa Solidária." width="40%" height="40%">
          </a>
          <a href="#" data-target="slide-out" class="sidenav-trigger">
            <i class="material-icons">menu</i>
          </a>
        </div>
      </nav>
    </div>
    <ul id="slide-out" class="sidenav sidenav-fixed no-print">
      <div>
        <li>
          <img class="responsive-img despensasolidaria-img-sidebar" src="./img/logo.jpeg" alt="Logotipo da Despensa Solidária.">
        </li>
        <li class="d-none-reducer">
          <div class="divider"></div>
        </li>
        <li class="d-none-reducer">
          <div class="user-view">
            <span class="name" id="userName"><?php echo $loggedUser->nome_preferencial; ?> </span>
            <span class="email" id="userEmail"><?php echo $loggedUser->email; ?> </span>
          </div>
        </li>
        <li class="d-none-reducer">
          <div class="divider"></div>
        </li>
        <li>
          <a href="./home" class="collapsible-header waves-effect waves-blue">
            <i class="material-icons">space_dashboard</i>Home </a>
        </li>

        <!-- MENU DE USUARIOS -->
        <li>
          <ul class="collapsible collapsible-accordion">
            <li>
              <a class="collapsible-header waves-effect waves-blue">
                <i class="material-icons">groups</i>Usuários <i class="material-icons right d-none-reducer" style="margin-right:0;">arrow_drop_down</i>
              </a>
              <div class="collapsible-body">
                <ul>
                  <li>
                    <a class="waves-effect waves-blue" href="./usuario-cadastrar">
                    <i class="material-icons">person_add</i>Cadastrar novo usuário</a>
                  </li>
                  <li>
                    <a class="waves-effect waves-blue" href="./usuarios">
                    <i class="material-icons">person_search</i>Buscar usuários</a>
                  </li>
                  <li>
                    <div class="divider"></div>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </li>
        <!-- MENU DE USUARIOS -->
        
        <!-- MENU DE DESPENSAS -->
        <li>
          <ul class="collapsible collapsible-accordion">
            <li>
              <a class="collapsible-header waves-effect waves-blue">
                <i class="material-icons">business</i>Despensas Solidárias <i class="material-icons right d-none-reducer" style="margin-right:0;">arrow_drop_down</i>
              </a>
              <div class="collapsible-body">
                <ul>
                  <li>
                    <a class="waves-effect waves-blue" href="./despensa-cadastrar">
                    <i class="material-icons">add</i>Cadastrar Despensa</a>
                  </li>
                  <li>
                    <a class="waves-effect waves-blue" href="./despensas">
                    <i class="material-icons">search</i>Buscar Despensa</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </li>
        <!-- MENU DE DESPENSAS -->
        
        <li>
          <div class="divider  d-none-reducer"></div>
        </li>
        <li>
          <a href="./php/logout.php" class="collapsible-header waves-effect waves-blue">
            <i class="material-icons">logout</i>Sair </a>
        </li>
      </div>
      <button class="hide-dropdown btn">
        <i class="material-icons" >arrow_left</i>
      </button>
    </ul>
    <div class="preloader-background hide">
      <div class="preloader-wrapper big active">
        <div class="spinner-layer spinner-green-only">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>