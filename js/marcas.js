$(document).ready(function() {
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
    success: function(result) {
      console.log(result);  // Aqui você pode ver a resposta do servidor no console
      
      // Se a resposta for uma mensagem simples, apenas exiba um alerta
      alert(result);  // Exibe a resposta, que pode ser uma string como "Status alterado com sucesso!"
      
      // Atualiza a página ou a parte necessária dela
      location.reload();  // Isso recarrega a página, você pode usar outras abordagens dependendo da necessidade
    },
    error: function(xhr, status, error) {
      alert('Erro na requisição: ' + error);  // Caso ocorra algum erro na requisição AJAX
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
      retorno = JSON.parse(result);
      console.log(retorno);
      $('#btn_modal').click();
      $("#descricaoMarca").val(retorno[0]['descriçaoMarca']);
      
      
      





    }
  });
}
// Quando o modal for exibido, move o foco para o campo de descrição
$('#exampleModal').on('shown.bs.modal', function () {
  $('#descricaoMarca').focus();
});



