<?php
	include 'layout/header.php';
?>
<!DOCTYPE HTML>
<html>
  <head>
    <script src="./js/despensas/analisar.js"></script>
  </head>
  <body class="fiducia-bg-third">
    <div class="">
      <div class="row">
        <div class="col s1 m1 l4 xl3"></div>
        <div class="col s10 m10 l7 xl8">
        <ul class="collapsible">
          <li class="active">
            <div class="collapsible-header"><i class="material-icons">account_circle</i>Dados da Despensa</div>
            <div class="collapsible-body">
              <form id="formData">
                <div class="row">
                <div class="col s12 m12 l12 xl12">
                  <h1 class="title-2">Dados da Despensa:</h1>
                </div>
                <div class="input-field col s12 m4">
                  <input id="txtTipoDespensa" name="txtTipoDespensa" type="text" readonly="true">
                  <label for="txtTipoDespensa">Tipo de Despensa</label>
                </div>
                <div class="input-field col s12 m6">
                  <input id="txtLogradouro" name="txtLogradouro" type="text" readonly="true">
                  <label for="txtLogradouro">Logradouro</label>
                </div>
                <div class="input-field col s12 m2">
                  <input id="txtNumero" name="txtNumero" type="text" readonly="true">
                  <label for="txtNumero">Numero</label>
                </div>
                <div class="input-field col s12 m4">
                  <input id="txtBairro" name="txtBairro" type="text" readonly="true">
                  <label for="txtBairro">Bairro</label>
                </div>
                <div class="input-field col s12 m6">
                  <input id="txtCidade" name="txtCidade" type="text" readonly="true">
                  <label for="txtCidade">Cidade</label>
                </div>
                <div class="input-field col s12 m2">
                  <input id="txtUF" name="txtUF" type="text" readonly="true">
                  <label for="txtUF">UF</label>
                </div>
                <div class="input-field col s12 m8">
                  <input id="txtComplemento" name="txtComplemento" type="text" readonly="true">
                  <label for="txtComplemento">Complemento</label>
                </div>
                <div class="input-field col s12 m4">
                  <input id="txtCEP" name="txtCEP" type="text" readonly="true">
                  <label for="txtCEP">CEP</label>
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