const tarefas = [
  "Faça uma caminhada",
  "Comece a Dançar",
  "Desenhe algo que Gosta",
  "Estude algo que Gosta",
  "Leia um capítulo de um Livro",
  "Medite 15 min",
  "Escute Música",
  "Toque Piano",
  "Toque Ukulele",
  "Faça uma Ikebana",
  "Escreva uma poesia",
];

function choose() {
  document.getElementById("btn").style.width = "500px";
  document.getElementById("btn").style.height = "300px";
  document.getElementById("btn").style.opacity = "0";
  document.getElementById("bdy").style.backgroundColor = "#1d4da7";

  setTimeout(function () {
    var slct = Math.round(Math.random() * (11 - 1));
    document.getElementById("txt").innerText = tarefas[slct];
    document.getElementById("bdy").style.backgroundColor = "#a8b9d0";
    document.getElementById("btn").style.opacity = "1";
  }, 1800);
}

function VerLista() {
  var list = "";

  for (i = 0; i < 11; i++) {
    list += tarefas[i] + "<br>";
  }

  document.getElementById("list").innerHTML = list;
}
