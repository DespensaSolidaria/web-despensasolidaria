const validateForm = () => {
  return (
    validateField("#txtNome", $("#txtNome").val(), "Nome Completo") &&
    validateField("#txtCPF", $("#txtCPF").val(), "CPF") &&
    validateField(
      "#dtDataNascimento",
      $("#dtDataNascimento").val(),
      "Data de Nascimento"
    ) &&
    validateField("#txtEmail", $("#txtEmail").val(), "Email")
  );
};

$(document).ready(function () {
  $("#btnSend").click(() => {
    const formData = $("#formData").serialize();
    if (!validateForm(formData)) return;
    $(".preloader-background").removeClass("hide");

    $.ajax({
      url: "./php/users/create.php",
      type: "post",
      dataType: "json",
      data: formData,
      success: function (response) {
        $(".preloader-background").addClass("hide");
        Swal.fire({
          icon: "success",
          title: "Usuário adicionado com sucesso!",
          confirmButtonColor: "#edb264",
          buttonsStyling: true,
          text: "",
        }).then(() => {
          window.location.href = `./usuarios`;
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
});

