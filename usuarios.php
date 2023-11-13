<?php
	include 'layout/header.php';
?>
  <script src="./js/usuarios/listar.js"></script>
  <body class="despensasolidaria-bg-third">
    <div class="">
      <div class="row">
        <div class="col s1 m1 l4 xl3"></div>
        <div class="col s10 m10 l7 xl8">
          <div class="card-panel despensasolidaria-card despensasolidaria-search-card">
            <div class="row p-0 m-0">
              <form id="formSearch">
                <h1 class="title-2">Buscar Usuários:</h1>
                <div class="row">
                  <div class="input-field col s12 m6 l6 xl4">
                    <input id="txtNome" name="txtNome"  class="uppercase-mask" type="text">
                    <label for="txtNome">Nome</label>
                  </div>
                  <div class="input-field col s12 m6 l6 xl4">
                    <input id="txtCPF" name="txtCPF" type="text" class="cpfcnpj-mask">
                    <label for="txtCPF">CPF</label>
                  </div>
                 
                  <div class="input-field col s12 m4">
                    <button type="button" id="btnSearch"  class="waves-effect waves-light btn despensasolidaria-bg-primary despensasolidaria-btn-block">
                      <i class="material-icons">search</i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
            <div class="row" id="dataTable">
              <div class="divider"></div>
              <table class="centered highlight responsive-table">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Analisar cliente</th>
                  </tr>
                </thead>
                <tbody id="resultsTable">
                  <tr>
                    <td colspan="6">Nenhum cliente foi encontrado!</td>
                  </tr>
                </tbody>
              </table>
              <ul class="pagination"></ul>
            </div>
          </div>
        </div>
        <div class="col s1 m1 l4 xl1"></div>
      </div>
    </div>
  </body>
</html>