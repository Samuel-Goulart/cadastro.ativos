$(document).ready(function () {
  $(".salvar").click(function () {
    let marca = $("#descricaoMarca").val();
    let idMarca = $("#idMarca").val();

    if (idMarca == "") {
      acao = 'inserir';
    } else {
      acao = 'update';
    }
    $.ajax({
      type: "POST",
      url: '../controle/marcas_controller.php',
      data: {
        marca: marca,
        acao: acao,  // Envia a ação (inserir ou atualizar)
        idMarca: idMarca
      },
      success: function (result) {
        alert(result);
        location.reload();
      }
    });
  });
});
// Função para mudar o status do ativo 

function muda_status(status, idMarca) {
  $.ajax({
    type: "POST",
    url: '../controle/marcas_controller.php',
    data: {
      acao: 'muda_status',
      status: status,
      idMarca: idMarca

    },
    success: function (result) {
      console.log(result)
      alert(result);
      location.reload();
    }
  });
}
function editar(idMarca) {

  $('#idMarca').val(idMarca);

  $.ajax({
    type: "POST",
    url: '../controle/marcas_controller.php',
    data: {
      acao: 'get_info',

      idMarca: idMarca

    },
    success: function (result) {
      retorno = JSON.parse(result)
      console.log(result);
      $('#btn_modal').click();
      $("#descricaoMarca").val(retorno[0]['descriçaoMarca']);
      
      
      




      console.log(retorno)

    }
  });
}
