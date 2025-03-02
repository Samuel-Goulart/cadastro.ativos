$(document).ready(function () {
  $("#salva_info").click(function () {
    let descricao_ativo = $("#ativo").val();
    let marca = $("#marca").val();
    let tipo = $("#tipo").val();
    let quantidade = $("#quantidade").val();
    let observacao = $("#observacao").val();
    let idAtivo = $("#idAtivo").val();

    let quantidadeMin = $("#quantidadeMin").val();
    let imgAtivo = $("#imgAtivo");
    let img = imgAtivo[0].files[0];
    if (idAtivo == "") {
      acao = "inserir";
    } else {
      acao = "update";
    }
    var formData = new FormData();
    formData.append("acao", acao);
    formData.append("descricao_ativo", descricao_ativo);
    formData.append("marca", marca);
    formData.append("tipo", tipo);
    formData.append("quantidade", quantidade);
    formData.append("quantidadeMin", quantidadeMin);
    formData.append("observacao", observacao);
    formData.append("idAtivo", idAtivo);
    formData.append("img", img);

    console.log(marca, tipo);
    $.ajax({
      type: "POST",
      url: "../controle/ativos_controller.php",
      data: formData,
      processData: false,
      contentType: false,

      success: function (result) {
        alert(result);
        location.reload();
      },
    });
  });
});
// Função para mudar o status do ativo
function muda_status(status, idAtivo) {
  $.ajax({
    type: "POST",
    url: "../controle/ativos_controller.php",
    data: {
      acao: "muda_status",
      status: status,
      idAtivo: idAtivo,
    },
    success: function (result) {
      console.log(result);
      alert(result);
      location.reload();
    },
  });
}
function editar(idAtivo) {
  $.ajax({
    type: "POST",
    url: "../controle/ativos_controller.php",
    data: {
      acao: "get_info",

      idAtivo: idAtivo,
    },
    success: function (result) {
      retorno = JSON.parse(result);
      $("#btn_modal").click();
      $("#idAtivo").val(idAtivo);
      $("#ativo").val(retorno[0]["descriçaoAtivo"]);
      $("#marca").val(retorno[0]["idMarca"]);
      $("#tipo").val(retorno[0]["idTipo"]);
      $("#quantidade").val(retorno[0]["quantidadeAtivo"]);
      $("#quantidadeMin").val(retorno[0]["quantidadeMinAtivo"]);
      $("#observacao").val(retorno[0]["observaçaoAtivo"]);
      if (retorno[0]["urlImagem"] != "") {
        $("#img_previer").attr(
          "src",
          window.location.protocol +
            "//" +
            window.location.host +
            "/" +
            retorno[0]["urlImagem"]
        );
        $(".div_previer").attr("style", "display:block");
      } else {
        $(".div_previer").attr("style", "display:none");
      }

      console.log(retorno);
    },
  });
}
// Função para deletar um ativo
function deletar(idAtivo) {
  // Confirmação antes de realizar a exclusão
  if (confirm("Tem certeza que deseja excluir este ativo?")) {
    $.ajax({
      type: "POST",
      url: "../controle/ativos_controller.php",
      data: {
        acao: "deletar",
        idAtivo: idAtivo,
      },
      success: function (result) {
        alert(result);
        location.reload();
      },
      error: function () {
        alert("Erro ao tentar excluir o ativo.");
      },
    });
  }
}
function mostrarMaisInformacoes(idAtivo) {
  $.ajax({
    type: "POST",
    url: "../controle/ativos_controller.php",
    data: {
      acao: "get_info",

      idAtivo: idAtivo,
    },
    success: function (result) {
      retorno = JSON.parse(result);
      $("#exampleModal").click();
      $("#idAtivo").val(idAtivo);
      $("#ativo").val(retorno[0]["descriçaoAtivo"]);
      $("#marca").val(retorno[0]["idMarca"]);
      $("#tipo").val(retorno[0]["idTipo"]);
      $("#quantidade").val(retorno[0]["quantidadeAtivo"]);
      $("#quantidadeMin").val(retorno[0]["quantidadeMinAtivo"]);
      $("#data").val(retorno[0]["dataCadastro"]);
      $("#status").val(retorno[0]["statusAtivo"]);
      $("#observacao").val(retorno[0]["observaçaoAtivo"]);
      if (retorno[0]["urlImagem"] != "") {
        $("#img_previer").attr(
          "src",
          window.location.protocol +
            "//" +
            window.location.host +
            "/" +
            retorno[0]["urlImagem"]
        );
        $(".div_previer").attr("style", "display:block");
      } else {
        $(".div_previer").attr("style", "display:none");
      }

      console.log(retorno);
    },
  });
}
function limpar_modal() {
  $("#ativo").val("");
  $("#marca").val("");
  $("#tipo").val("");
  $("#quantidade").val("");
  $("#observacao").val("");
  $("#idAtivo").val("");
  $("#quantidadeMin").val("");

  $("#imgAtivo").val("");
  $("#img_previer").attr("src", ""); // Limpa a visualização da imagem
  $(".div_previer").hide(); // Esconde a div de pré-visualização de imagem
}
