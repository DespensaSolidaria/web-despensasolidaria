<?php
	include 'layout/header.php';
?>
  <script src="./js/despensas/listar.js"></script>
  <body class="despensasolidaria-bg-third">
    <div class="">
      <div class="row">
        <div class="col s1 m1 l4 xl3"></div>
        <div class="col s10 m10 l7 xl8">
          <div class="card-panel despensasolidaria-card despensasolidaria-search-card">
            <div class="row p-0 m-0">
              <form id="formSearch">
                <h1 class="title-2">Buscar Despensas:</h1>
                <div class="row">
                  <div class="input-field col s12 m6 l6 xl4">
                    <select id="slTipoDespensa" name="slTipoDespensa">
                      <option value="T">Todas</option>
                      <option value="G">Refrigeradas</option>
                      <option value="Q">Comuns</option>
                    </select>
                    <label for="slTipoDespensa">Tipo Despensa</label>
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
                    <th>Tipo Despensa</th>
                    <th>Endereço</th>
                    <th>Analisar despensa</th>
                  </tr>
                </thead>
                <tbody id="resultsTable">
                  <tr>
                    <td colspan="6">Nenhuma despensa foi encontrada!</td>
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