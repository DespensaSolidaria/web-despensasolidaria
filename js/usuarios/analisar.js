$(document).ready(function () {
  const $_GET = getURLVariables();
  const userId = $_GET["idUsuario"];
  $(".preloader-background").removeClass("hide");
  $("#dataTable").hide();

  if ($_GET["idUsuario"] === undefined) {
    $(".preloader-background").removeClass("hide");
    Swal.fire({
      icon: "error",
      title: "Oops...",
      confirmButtonColor: "#edb264",
      buttonsStyling: true,
      text: "Usuário não encontrado!",
    }).then(() => {
      window.location.href = "./usuarios";
    });
  }

  $.ajax({
    url: "./php/users/getUserById.php",
    type: "post",
    dataType: "json",
    data: {
      userId,
    },
    success: function (response) {
      $(".preloader-background").addClass("hide");
      $(".collapsible label").addClass("active");

      $("#txtNomeRazaoSocial").val(response.nome);
      $("#txtNomePreferencial").val(response.nome_preferencial);
      $("#txtCpfCnpj").val(formatCnpjCpf(response.documento));
      $("#dtDataNascimento").val(response.data_nascimento);
      $("#txtEmail").val(response.email);

      let rowBiometrias = "";
      const dadosBiometrias = response.biometrias;
      dadosBiometrias.forEach((row) => {
        rowBiometrias += `<div class="row">
        <div class="col s12 m12 l12 xl12">
          <h4 class="title-2">Despensa: ${row.ponto_doacao.id}</h4>
        </div>
      `;
      });

      if (rowBiometrias !== "") {
        $("#rowBiometrias").html(rowBiometrias);
      }

      $(".preloader-background").addClass("hide");

      M.updateTextFields();
    },
    error: function (err) {
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

