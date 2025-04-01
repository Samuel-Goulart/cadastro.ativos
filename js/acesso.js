$(document).ready(function () {
  $(".salvarAcesso").click(function () {
    let array_acesso = [];
    

    $(".check").each(function (index, elemento) {
      let acessoItem = {};

      if (!array_acesso[index]) {
        array_acesso[index] = {};  // Inicializando o objeto no índice específico
    }
    if ($(elemento).is(":checked")) {
        array_acesso[index]['idOpcao'] = $(elemento).val();
        array_acesso[index]['acesso'] = 'S';

    } else {
        array_acesso[index]['idOpcao'] = $(elemento).val();
        array_acesso[index]['acesso'] = 'N';
    }
    });

    let cargo = $("#cargo").val();
    let array_dados = {
      acao:'gravar_acesso',

      cargo: cargo,
      acessos: array_acesso,
    };

    console.log(array_dados);

    $.ajax({
      type: "POST",
      url: "../controle/acesso_controller.php",
      contentType: "application/json",
      dataType: "json",
      data: JSON.stringify(array_dados),
      success: function (result) {
        alert(result);
        location.reload();
      },
      error: function (error) {
        alert("Erro ao salvar ativo!");
      },
    });
  });
});
function busca_acesso() {
  let cargo = $("#cargo").val();
  $('.check').each(function (index, element) {
    $(element).prop('checked',false)
  });


  $.ajax({
    type: "POST",
    url: "../controle/acesso_controller.php",
    data: {
      acao: "buscar_acesso",
      cargo: cargo,
    },
    success: function (result) {
      let retorno = JSON.parse(result);

      $(retorno).each(function (index, acesso) {
      if(acesso.statusAcesso=='S'){
        $('.'+acesso.idOpcao).prop('checked',true);
      }else{
        $('.'+acesso.idOpcao).prop('checked',false);
      }
      console.log(acesso);
    })
    },
  });
}
