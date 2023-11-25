const validateForm = () => {
  return (
    validateField("#txtDescricao", $("#txtDescricao").val(), "Descrição") &&
    validateField("#txtCEP", $("#txtCEP").val(), "CEP") &&
    validateField("#txtLogradouro", $("#txtLogradouro").val(), "Logradouro") &&
    validateField("#txtNumero", $("#txtNumero").val(), "Número") &&
    validateField("#txtBairro", $("#txtBairro").val(), "Bairro") &&
    validateField("#txtCidade", $("#txtCidade").val(), "Cidade") &&
    validateField("#txtUF", $("#txtUF").val(), "UF")
  );
};

$(document).ready(function () {
  $("#btnSend").click(() => {
    const formData = $("#formData").serialize();
    if (!validateForm(formData)) return;
    $(".preloader-background").removeClass("hide");

    $.ajax({
      url: "./php/donatePoints/create.php",
      type: "post",
      dataType: "json",
      data: formData,
      success: function (response) {
        $(".preloader-background").addClass("hide");
        Swal.fire({
          icon: "success",
          title: "Despensa adicionada com sucesso!",
          confirmButtonColor: "#edb264",
          buttonsStyling: true,
          text: "",
        }).then(() => {
          window.location.href = `./despensas`;
        });
      },
      error: function (err) {
        $(".preloader-background").addClass("hide");
        Swal.fire({
          icon: "error",
          title: "Erro ao enviar formulário",
          confirmButtonColor: "#edb264",
          buttonsStyling: true,
          text: err.responseText.erro
            ? err.responseText.erro
            : err.responseText,
        }).then(() => {
          // window.location.href = './php/logout'
        });
      },
    });
  });

  $("#txtCEP").blur(() => {
    const value = $("#txtCEP").val();

    const formattedCep = value.replace(/\.|-|\//gm, "").replace(/\s/g, "").trim();

    $(".preloader-background").removeClass("hide");
    $.ajax({
      url: "./php/getCep.php",
      type: "post",
      dataType: "json",
      data: {
        cep: formattedCep,
      },
      success: function (response) {
        $(".preloader-background").addClass("hide");

        if(response.erro === true) {
          Swal.fire({
            icon: "error",
            title: "Erro ao consultar CEP",
            confirmButtonColor: "#edb264",
            buttonsStyling: true,
            text: "CEP informado não encontrado!",
          }).then(() => {
            // window.location.href = './php/logout'
          });
        } else {
          $("#txtLogradouro").val(response.logradouro);
          $("#txtBairro").val(response.bairro);
          $("#txtCidade").val(response.localidade);
          $("#txtUF").val(response.uf);
          $("#txtNumero").focus();
        }
      },
      error: function (err) {
        $(".preloader-background").addClass("hide");
        Swal.fire({
          icon: "error",
          title: "Erro ao consultar CEP",
          confirmButtonColor: "#edb264",
          buttonsStyling: true,
          text: "CEP informado não encontrado!",
        }).then(() => {
          // window.location.href = './php/logout'
        });
      },
    });

  });
});

