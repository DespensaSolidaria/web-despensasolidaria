$(document).ready(function () {
  const $_GET = getURLVariables();
  const donatePointId = $_GET["idDespensa"];
  $(".preloader-background").removeClass("hide");
  $("#dataTable").hide();

  if ($_GET["idDespensa"] === undefined) {
    $(".preloader-background").removeClass("hide");
    Swal.fire({
      icon: "error",
      title: "Oops...",
      confirmButtonColor: "#edb264",
      buttonsStyling: true,
      text: "Despensa não encontrada!",
    }).then(() => {
      // window.location.href = "./despensas";
    });
  }

  $.ajax({
    url: "./php/donatePoints/getDonatePointById.php",
    type: "post",
    dataType: "json",
    data: {
      donatePointId,
    },
    success: function (response) {
      $(".preloader-background").addClass("hide");
      $(".collapsible label").addClass("active");

      $("#txtTipoDespensa").val(tipoDespensa(response.tipo_ponto_doacao));
      $("#txtLogradouro").val(response.logradouro);
      $("#txtNumero").val(response.numero);
      $("#txtBairro").val(response.bairro);
      $("#txtCidade").val(response.cidade);
      $("#txtUF").val(response.uf);
      $("#txtComplemento").val(response.complemento);
      $("#txtCEP").val(formatCEP(response.cep));

      let rowBiometrias = "";
      const dadosBiometrias = response.biometrias;
      dadosBiometrias.forEach((row) => {
        rowBiometrias += `<div class="row">
        <div class="col s12 m12 l12 xl12">
          <span><a href="./usuario-analisar?idUsuario=${row.usuario.id}">${row.usuario.nome}</a></span>
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

