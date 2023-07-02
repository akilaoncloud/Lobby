// Exercício 4

function escreverTelaMx() {
  var max = Math.max(a, b, c, d, e);
  return max;
}

function escreverTelaMn() {
  var min = Math.min(a, b, c, d, e);
  return min;
}

// Exercício 5

function pegarNumero() {
  var a = prompt("Digite um número: ");
  return a;
}

// Exercício 6

function repetirNum() {
  for (i = 1; i <= n; i++) {
    a += i + " ";
    document.write(a + "<br>");
  }
}

// Exercício 7

function RegistrarDados() {
  var nm = document.getElementById("nm").value;
  var dt = document.getElementById("dt").value;
  var nmr = document.getElementById("nmr").value;
  var eml = document.getElementById("eml").value;
  var snh = document.getElementById("snh").value;

  alert(nm + " " + dt + " " + nmr + " " + eml + " " + snh);
}

// Exercício 8

function RegistrarDadosProf() {
  var cd_id = document.getElementById("cd_id").value;
  var nm = document.getElementById("nm").value;
  var mtrc = document.getElementById("mtrc").value;
  var trm =
    document.getElementById("trma").options[trma.selectedIndex].textContent;

  document.getElementById("div").innerHTML =
    cd_id + "<br>" + nm + "<br>" + mtrc + "<br>" + trm;
}

// Exercício 9

function RegistrarDadosAlun() {
  var cd_id = document.getElementById("cd_id").value;
  var nm = document.getElementById("nm").value;
  var mtrc = document.getElementById("mtrc").value;
  var cr =
    document.getElementById("cor").options[cor.selectedIndex].textContent;

  var color = document.getElementById("cor").options[cor.selectedIndex].value;
  document.body.style.backgroundColor = color;

  document.getElementById("div").innerHTML =
    cd_id + "<br>" + nm + "<br>" + mtrc + "<br>" + cr;
}

// Exercício 10
// DOM adaptativo que verifica qualquer Formulário de qualquer tamanho

function validarForm(f) {
  // Parâmetro 'f' seleciona qual formulário validar

  var campo = document.forms[f].elements;
  // Todos os campos preenchíveis de um formulário

  for (i = 0; i < campo.length; i++) {
    // Loop flexível de acordo com a quantidade de campos
    // .length conta quantos elementos (campos) próprios do <form> existem
    // Tags não próprias do <form> não são contabilizadas

    if (campo[i].value == "") {
      // If com variável 'i' escaneia por um campo vazio

      alert(campo[i].placeholder + " não está preenchido");
      // Alert() notifica o exato campo que está vazio

      campo[i].focus();
      // Focus() seleciona o campo para preenchimento

      return false;
      // Loop é quebrado ao retornar 'false'
      // Alert() não notifica vários campos de uma vez
    }
  }
}

// Exercício 11

function theEllipse(f) {
  var campo = document.forms[f].elements;

  for (i = 0; i < campo.length; i++) {
    // Select
    if (campo[i] == "[object HTMLSelectElement]") {
      var slct = campo[i].options[campo[i].selectedIndex];

      if (slct.value == "") {
        alert(slct.text + " não está preenchido");
        campo[i].focus();
        return false;
      }
    }

    // Text, email, number, password, url, [...]
    if (campo[i].value == "") {
      alert(campo[i].placeholder + " não está preenchido");
      campo[i].focus();
      return false;
    }

    // Checkbox
    if (campo[i].type == "checkbox" && campo[i].checked == false) {
      alert(campo[i].name + " não está preenchido");
      return false;
    }

    // Radio
    if (campo[i].type == "radio") {
      var rad = document.getElementsByName(campo[i].name);
      var vldt_rad = 0;

      for (r = 0; r < rad.length; r++) {
        if (rad[r].checked == true) {
          vldt_rad += 1;
        } else {
          vldt_rad += 0;
        }
      }

      if (vldt_rad == 0) {
        alert(campo[i].name + " não está preenchido");
        return false;
      }
    }
  }
}
