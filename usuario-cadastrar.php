<?php
    include 'layout/header.php';
?>
<!DOCTYPE HTML>
<html>
   <head>
      <script src="./js/usuarios/inserir.js"></script>
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
                                <h3 class="title-2">Cadastrar usuário:</h3>
                            </div>
                            <div class="input-field col s12 m6">
                                <input  id="txtNome" name="txtNome" class="validate uppercase-mask" type="text">
                                <label for="txtNome">Nome Completo *</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input  id="txtNomePreferencial" name="txtNomePreferencial" class="validate uppercase-mask" type="text">
                                <label for="txtNomePreferencial">Nome Preferencial</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input  id="txtCPF" name="txtCPF" type="text" class="validate uppercase-mask cpf-mask">
                                <label for="txtCPF">CPF *</label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <input  id="dtDataNascimento" name="dtDataNascimento" max="<?php echo date("Y-m-d"); ?>" type="date">
                                <label for="dtDataNascimento">Data de Nascimento *</label>
                            </div>
                            <div class="input-field col s12 m6 l4">
                                <input  id="txtEmail" name="txtEmail" class="uppercase-mask" type="text">
                                <label for="txtEmail">E-mail *</label>
                            </div>
                        </div>
                        <div class="input-field col s12 m6 offset-m6 xl4 offset-xl8">
                            <button type="button" id="btnSend" class="waves-effect waves-light btn despensasolidaria-bg-primary despensasolidaria-btn-block">
                            <i class="material-icons left">person_add</i>Cadastrar Usuário</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </body>
</html>
