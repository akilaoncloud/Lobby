function abrir(pagina, janela) {
  if (janela == "") {
    janela == "janela";
  }
  window.open(pagina, janela, "height=350, width=640");
}

function retorna(retorno) {
  // Verifica se o opener existe e não está fechado
  if (window.opener && !window.opener.closed) {
    window.opener.document.dados.codigo.value = retorno;
    window.close();
  } else {
    alert("Janela Pai não Existente");
  }
}
