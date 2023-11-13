const limit = 15;
var currentPage = 0;
let context;

function get_pagination(current, qtdPages) {
  let pagination = "";

  if (currentPage > 0) {
    pagination += `<li class="waves-effect" onclick="renderPage(${0})" data-page='${0}'><a href="#!">Primeiro</a></li>`;

    pagination += `
    <li onclick="renderPage(${current - 1})" data-page='${
      current - 1
    }'><a href="#!"><i class="material-icons">chevron_left</i></a></li>`;
  }

  pagination += `<li class='active' onclick="renderPage(${currentPage})" data-page='${current}'><a href="#!">${
    current + 1
  }</a></li>
  `;

  if (qtdPages - 1 > current) {
    pagination += `<li class="waves-effect" onclick="renderPage(${
      currentPage + 1
    })" data-page='${
      current + 1
    }'><a href="#!"><i class="material-icons">chevron_right</i></a></li>`;

    pagination += `<li class="waves-effect" onclick="renderPage(${
      qtdPages - 1
    })" data-page='${qtdPages - 1}'><a href="#!">Último</a></li>`;
  }

  return pagination;
}

function renderPage(set) {
  currentPage = parseInt(set);
  $(".pagination").html(
    get_pagination(currentPage, Math.ceil(context.length / limit))
  );
  tableText = "";

  if (currentPage > 0) {
    for (var i = currentPage * limit; i < currentPage * limit + limit; i++) {
      if (context[i] !== undefined) {
        tableText += templatOption(context[i]);
      }
    }
    $("#resultsTable").empty();
    $("#resultsTable").html(tableText);
  } else {
    for (var i = 0; i < limit; i++) {
      if (context[i] !== undefined) {
        tableText += templatOption(context[i]);
      }
    }
    $("#resultsTable").empty();
    $("#resultsTable").html(tableText);
  }
}

function templatOption(data) {
  if (data !== undefined) {
    return `<tr>
      <td>${data.nome}</td>
      <td>${formatCnpjCpf(data.documento)}</td>
      <td><a href="./usuario-analisar?idUsuario=${
        data.id
      }" style="margin: 5px;" data-position="bottom" data-tooltip="Ver dados sobre do cliente"  class="tooltipped waves-effect waves-light btn despensasolidaria-bg-primary"><i class="material-icons">assignment</i></a></td>
    </tr>`;
  }
  return "";
}

$(document).ready(function () {
  $("#dataTable").hide();

  $(".preloader-background").removeClass("hide");

  $("#btnSearch").click(() => {
    $(".preloader-background").removeClass("hide");
    const formData = $("#formSearch").serialize();
    emptySearch();
    $(".pagination").html("");
    $.ajax({
      url: "./php/users/list.php",
      type: "post",
      dataType: "json",
      data: formData,
      success: function (response) {
        let tableText = "";
        context = response;
        $(".preloader-background").addClass("hide");
        $("#dataTable").show(400);
        for (var i = 0; i < limit; i++) {
          tableText += templatOption(context[i]);
        }
        $(".pagination").html(
          get_pagination(currentPage, Math.ceil(context.length / limit))
        );

        $("#dataTable").show(400);
        $("#resultsTable").empty();
        $("#resultsTable").append(tableText);
        $(".tooltipped").tooltip();
      },
      error: function (err) {
        $(".preloader-background").addClass("hide");
        console.log(err);
        Swal.fire({
          icon: "error",
          title: "Oops...",
          confirmButtonColor: "#edb264",
          buttonsStyling: true,
          text: err.responseJSON.erro,
        }).then(() => {
          // window.location.href = './php/logout'
        });
      },
    });
  });

  $("#btnSearch").click();
});

function emptySearch() {
  currentPage = 0;
  $(".pagination").empty();
}
