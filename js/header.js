$(document).ready(function () {
  M.AutoInit();

  //$('.sidenav').sidenav();
  //$('.dropdown-trigger').dropdown();
  //$('.collapsible').collapsible();

  $(".money-mask").mask("##.###.##0,00", { reverse: true });
  $(".cpfcnpj-mask").mask("000.000.000-0000"); //14
  $(".cpf-mask").mask("000.000.000-00"); //14
  $("#txtNumeroParcelas").mask("000"); //14
  $(".cnpj-mask").mask("00.000.000/0000-00"); //14
  $(".rg-mask").mask("00.000.000-00"); //14
  $(".cep-mask").mask("00000-000"); //14
  $(".phone-mask").mask("(00) 0000-0000"); //14
  $("#txtplaca").attr("maxlength", "7"); //14
  $("#txtrenavam").attr("maxlength", "11"); //14
  $("#txtchassi").attr("maxlength", "21"); //14
  $("#txtanoFabricacao, #txtanoModelo").attr("maxlength", "4");

  $(document).ready(function () {
    if (
      localStorage.getItem("reducedNav") !== null &&
      localStorage.getItem("reducedNav") !== "0"
    ) {
      $(".hide-dropdown").addClass("active", 800);
      $("#slide-out").addClass("reduced", 800);
      $(".hide-dropdown .material-icons").html("arrow_right");
    }
  });

  $(".hide-dropdown").click(() => {
    if ($(".hide-dropdown.active").length === 0) {
      localStorage.setItem("reducedNav", "1");
      $(".hide-dropdown .material-icons").html("arrow_right");
      $(".hide-dropdown").addClass("active", 800);
      $("#slide-out").addClass("reduced", 800);
    } else {
      localStorage.setItem("reducedNav", "0");
      $(".hide-dropdown .material-icons").html("arrow_left");
      $(".hide-dropdown").removeClass("active", 800);
      $("#slide-out").removeClass("reduced", 800);
    }
  });

  $(".uppercase-mask").keyup((element) => {
    const el = String($(element.target).val());
    $(element.target).val(el.toUpperCase());
  });

  $(".cpfcnpj-mask").keyup((element) => {
    const currentValue = $(element.target).val();
    if (currentValue.length <= 14) {
      $(element.target).mask("000.000.000-0000");
    } else {
      $(element.target).mask("00.000.000/0000-00");
    }
  });

  $(".phone-mask").keyup((element) => {
    const currentValue = $(element.target).val();
    if (currentValue.length < 15) {
      $(element.target).mask("(00) 0000-00000"); //14
    } else {
      $(element.target).mask("(00) 00000-0000");
    }
  });

  $(".decimal-mask").keyup((element) => {
    $(element.target).mask("#00,000", { reverse: true });
  });

  $('input[type="number"]:not(.decimal-mask)').keyup((element) => {
    const currentValue = $(element.target).val();
    $(element.target).val(currentValue.replace(/[^0-9.]/g, ""));
  });

  // CARREGAR DADOS DO USUÁRIO LOGADO
  $.ajax({
    url: "./php/getLoggedUser.php",
    type: "post",
    dataType: "json",
    success: function (response) {
      if (response !== null) {
        $("#userName").text(response.nome_preferencial);
        $("#userEmail").text(response.email);
      }
    },
    error: function (err) {
      console.log(err);
    },
  });
});

$(".invalid").change(() => {
  $(this).removeClass("invalid");
});
