document.getElementById("ativo").addEventListener("change", function () {
  var ativoSelecionado = this.value;
  var campoMarca = document.getElementById("marca");
  var campoTipo = document.getElementById("tipo");

  if (ativoSelecionado) {
    campoMarca.disabled = true;
    campoTipo.disabled = true;
  } else {
    campoMarca.disabled = false;
    campoTipo.disabled = false;
  }
});
