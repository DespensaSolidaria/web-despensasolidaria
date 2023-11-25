<?php
	include 'layout/header.php';
?>
<!DOCTYPE HTML>
<html>
  <head>
    <script src="./js/usuarios/analisar.js"></script>
  </head>
  <body class="fiducia-bg-third">
    <div class="">
      <div class="row">
        <div class="col s1 m1 l4 xl3"></div>
        <div class="col s10 m10 l7 xl8">
        <ul class="collapsible">
          <li class="active">
            <div class="collapsible-header"><i class="material-icons">account_circle</i>Dados Cadastrais</div>
            <div class="collapsible-body">
              <form id="formData">
                <div class="row">
                <div class="col s12 m12 l12 xl12">
                  <h1 class="title-2">Dados Cadastrais:</h1>
                </div>
                <div class="input-field col s12 m6">
                  <input id="txtNomeRazaoSocial" name="txtNomeRazaoSocial" type="text" readonly="true">
                  <label for="txtNomeRazaoSocial">Nome Completo</label>
                </div>
                <div class="input-field col s12 m6">
                  <input id="txtNomePreferencial" name="txtNomePreferencial" type="text" readonly="true">
                  <label for="txtNomePreferencial">Nome Preferencial</label>
                </div>
                <div class="input-field col s12 m3">
                  <input id="txtCpfCnpj" name="txtCpfCnpj" type="text" readonly="true">
                  <label for="txtCpfCnpj">CPF/CNPJ</label>
                </div>
                <div class="input-field col s12 m3">
                  <input id="dtDataNascimento" name="dtDataNascimento" type="date"  readonly="true">
                  <label for="dtDataNascimento">Nascimento</label>
                </div>
                <div class="input-field col s12 m6">
                  <input id="txtEmail" name="txtEmail" type="text" readonly="true">
                  <label for="txtEmail">E-mail</label>
                </div>                
              </form>
            </div>
          </li>
          <li>
            <div class="collapsible-header"><i class="material-icons">assignment</i>Biometrias</div>
            <div class="collapsible-body ">
              <div class="row mb-0" id="rowBiometrias" ><span class="text-secondary-desc">Nenhuma biometria cadastrada</span></div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </body>
</html>