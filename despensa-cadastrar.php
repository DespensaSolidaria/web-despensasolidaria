<?php
    include 'layout/header.php';
?>
<!DOCTYPE HTML>
<html>
   <head>
      <script src="./js/despensas/inserir.js"></script>
   </head>
   <body class="despensasolidaria-bg-third">
    <div class="">
        <div class="row">
            <div class="col s1 m1 l4 xl3"></div>
                <div class="col s10 m10 l7 xl8">
                    <form id="formData" >
                    <div class="card-panel despensasolidaria-card despensasolidaria-search-card row">
                        <div class="row">
                            <div class="col s12 m12 l12 xl12">
                                <h3 class="title-2">Cadastrar despensa:</h3>
                            </div>
                            <div class="input-field col s12 m4">
                                <select id="slTipoDespensa" name="slTipoDespensa">
                                    <option value="G">Refrigeradas</option>
                                    <option value="Q">Comuns</option>
                                </select>
                                <label for="slTipoDespensa">Tipo de despensa</label>
                            </div>
                            <div class="input-field col s12 m8">
                                <input  id="txtDescricao" name="txtDescricao" class="validate" type="text">
                                <label for="txtDescricao">Descrição</label>
                            </div>
                            <div class="input-field col s12 m4">
                                <input id="txtCEP" name="txtCEP" class="validate cep-mask" type="text">
                                <label for="txtCEP">CEP</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input  id="txtLogradouro" name="txtLogradouro" type="text" class="validate">
                                <label for="txtLogradouro">Logradouro</label>
                            </div>
                            <div class="input-field col s12 m2">
                                <input  id="txtNumero" name="txtNumero" type="text" class="validate">
                                <label for="txtNumero">Número</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input  id="txtBairro" name="txtBairro" class="validate" type="text">
                                <label for="txtBairro">Bairro</label>
                            </div>
                            <div class="input-field col s12 m4">
                                <input  id="txtCidade" name="txtCidade" type="text" class="validate">
                                <label for="txtCidade">Cidade</label>
                            </div>
                            <div class="input-field col s12 m2">
                                <input  id="txtUF" name="txtUF" type="text" class="validate">
                                <label for="txtUF">UF</label>
                            </div>
                            <div class="input-field col s12 m4">
                                <input  id="txtComplemento" name="txtComplemento" class="validate" type="text">
                                <label for="txtComplemento">Complemento</label>
                            </div>
                            <div class="input-field col s12 m8">
                                <input  id="txtReferencia" name="txtReferencia" class="validate" type="text">
                                <label for="txtReferencia">Referência</label>
                            </div>
                        </div>
                        <div class="input-field col s12 m6 offset-m6 xl4 offset-xl8">
                            <button type="button" id="btnSend" class="waves-effect waves-light btn despensasolidaria-bg-primary despensasolidaria-btn-block">
                            <i class="material-icons left">add_circle</i>Cadastrar Despensa</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </body>
</html>
