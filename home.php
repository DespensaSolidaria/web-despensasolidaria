<?php
	include 'layout/header.php';
?>
<!DOCTYPE HTML>
<html>
  <head></head>
  <body class="despensasolidaria-bg-third">
    <div class="">
      <div class="row">
        <div class="col s1 m1 l4 xl3"></div>
        <div class="col s10 m10 l7 xl8  row">
          <div class="home-container">
            <div class="col s12 m6 l3 xl3">
              <div class="card-option">
                <a class="card-content" href="usuarios">
                  <i class="material-icons">groups</i>
                  <span class="card-title">Usuários</span>
                </a>
              </div>
            </div>

            <?php if($_SESSION["partner"] === 1) {
              echo '<div class="col s12 m6 l3 xl3">
                <div class="card-option">
                  <a class="card-content" href="parceiros">
                    <i class="material-icons">business_center</i>
                    <span class="card-title">Parceiros</span>
                  </a>
                </div>
              </div>'; 
            } ?>
            <div class="col s12 m6 l3 xl3">
              <div class="card-option">
                <a class="card-content" href="operacoes">
                  <i class="material-icons">assignment</i>
                  <span class="card-title">Operações</span>
                </a>
              </div>
            </div>
            
          </div>
        </div>
        <div class="col s1 m1 l4 xl1"></div>
      </div>
    </div>
  </body>
</html>