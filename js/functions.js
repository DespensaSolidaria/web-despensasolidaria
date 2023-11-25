function getURLVariables() {
  let $_GET = {};
  if (document.location.toString().indexOf("?") !== -1) {
    const query = document.location
      .toString()
      // get the query string
      .replace(/^.*?\?/, "")
      // and remove any existing hash string (thanks, @vrijdenker)
      .replace(/#.*$/, "")
      .split("&");

    for (let i = 0, l = query.length; i < l; i++) {
      const aux = decodeURIComponent(query[i]).split("=");
      $_GET[aux[0]] = aux[1];
    }
  }

  return $_GET;
}

function formatRg(v) {
  v = v.replace(/\D/g, ""); //Substituí o que não é dígito por "", /g é [Global][1]
  v = v.replace(/(\d{1,2})(\d{3})(\d{3})(\d{1})$/, "$1.$2.$3-$4");

  return v;
}

function isNullisEmptyString(str) {
  return str === null || str === undefined ? "-" : String(str);
}

function formatCnpjCpf(value) {
  const cnpjCpf = value.replace(/\D/g, "");

  if (cnpjCpf.length === 11)
    return cnpjCpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/g, "$1.$2.$3-$4");
  return cnpjCpf.replace(
    /(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/g,
    "$1.$2.$3/$4-$5"
  );
}

function formatCEP(value) {
  const cep = value.replace(/\D/g, "");
  return cep.replace(/(\d{5})(\d{3})/g, "$1-$2");
}

function formatPhone(value) {
  if (value.length !== 10) {
    return value
      .replace(/\D/g, "")
      .replace(/(\d{2})(\d)/, "($1) $2")
      .replace(/(\d{5})(\d{4})/, "$1-$2");
  }
  return value
    .replace(/\D/g, "")
    .replace(/(\d{2})(\d)/, "($1) $2")
    .replace(/(\d{4})(\d{4})/, "$1-$2");
}

function formatPercent(number) {
  return number + "%";
}

function formatMoney(number) {
  if (isNaN(number) || number === null) number = 0;
  return number.toLocaleString("pt-BR", {
    minimumFractionDigits: 2,
    style: "currency",
    currency: "BRL",
  });
}

function tipoDespensa(tipoDespensa) {
  switch(tipoDespensa) {
    case "G": return "Refrigerada";
    case "Q": return "Comum";
  }
}

function validateField(rel, field, display = null) {
  if (field === "") {
    $(rel).addClass("invalid");
    if (display !== null) {
      Swal.fire({
        icon: "error",
        title: "Erro ao enviar formulário",
        confirmButtonColor: "#edb264",
        buttonsStyling: true,
        text: "Campo inválido: " + display,
      }).then(() => {
        // window.location.href = './php/logout'
      });
      return false;
    }
    return true;
  } else {
    $(rel).removeClass("invalid");
  }
  return true;
}

function formatDate(dateString) {
  const explodedDates = dateString.split("-");
  return `${explodedDates[2]}/${explodedDates[1]}/${explodedDates[0]}`;
}
