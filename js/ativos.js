$(document).ready(function () {
  $("#salva_info").click(function (event) {
      event.preventDefault();  // Evita o envio automático do formulário
      
      let descricao_ativo = $("#ativo").val();
      let campo_extra = $("#campo_extra").val();
      let marca = $("#marca").val();
      let tipo = $("#tipo").val();
      let quantidade = $("#quantidade").val();
      let quantidadeMin = $("#quantidadeMin").val();
      let observacao = $("#observacao").val();
      let idAtivo = $("#idAtivo").val();
      let imgAtivo = $("#imgAtivo")[0].files[0];  // Obtendo a imagem
      let acao = idAtivo == "" ? "inserir":  "update";
      // Validar campos obrigatórios
      if (!descricao_ativo || !marca || !tipo || !quantidade || !quantidadeMin || !observacao ) {
          alert('Por favor, preencha todos os campos obrigatórios!');
          return false;  // Impede o envio do formulário
      }
      if(!imgAtivo && acao=='inserir'){
        alert( 'campo imagem e obrigatorio');
        return false;
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
      formData.append("img", imgAtivo);
      formData.append("campo_extra", campo_extra);


      // Envia via AJAX
      $.ajax({
          type: "POST",
          url: "../controle/ativos_controller.php",
          data: formData,
          processData: false,
          contentType: false,
          success: function (result) {
              alert(result);
              location.reload();  // Atualiza a página após sucesso
          },
          error: function (error) {
              alert('Erro ao salvar ativo!');
          }
      });
  });
});
/*
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
*/
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
      $("#campo_extra").val(retorno[0]["observacaoQuantidade"]);
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
      
    
      $("#quantidade").on("input", function() {
        var valorAtual = $(this).val();
        
        if (valorAtual !== valorInicialCampoExtra) {
          adicionarModulo();
        }
       
      });
    },
  });
}

function adicionarModulo() {

  $("#campo_extra").on("input", function() {
    var valorAtual = $(this).val();
  
    // Verifica se o valor foi alterado
    if (valorAtual !== valorInicialCampoExtra) {
      // Se o valor foi alterado, mostra o campo extra
      $(this).css("display", "block");
      console.log("Valor alterado, campo mostrado!");
    } else {
      // Se o valor não foi alterado, esconde o campo extra
      $(this).css("display", "none");
      console.log("Valor não alterado, campo ocultado!");
    }
  });
  
}


function deletar(idAtivo) {

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

function limpar_modal() {
  $("#ativo").val("");
  $("#marca").val("");
  $("#tipo").val("");
  $("#quantidade").val("");
  $("#observacao").val("");
  $("#idAtivo").val("");
  $("#quantidadeMin").val("");

  $("#imgAtivo").val("");
  $("#img_previer").attr("src", ""); 
  $(".div_previer").hide(); 
}
