

$(document).ready(function () {
  $(function () {
      $('[data-toggle="tooltip"]').tooltip()
  })

  $(".salvar").click(function() {
      var marca = $('#descriçaoMarca').val();
      var idMarca = $('#idMarca').val();

      if (idMarca == "") {
          alert('Campo da marca deve ser preenchido!')
          return;
      }

      var acao = (idMarca == '') ? 'insert' : 'update';

      $.ajax({
          type: "POST",
          url: "../controle/marcas_controller.php",
          data: {
              acao: acao,
              marca: marca,
              idMarca: idMarca
          },
          success: function(response) {
              console.log(response);
              try {
                  var data = JSON.parse(response);
                  if (data.status === 'sucesso') {
                      alert('Informação Salva');
                      location.reload();
                  } else {
                      alert('Erro ao Salvar');
                  }
              } catch (e) {
                  console.error("Erro ao analisar JSON:", e);
                  alert('Erro ao processar a resposta');
              }
          },
          error: function(e) {
              console.log("ERROR : ", e);
          },
      });
  });

  $(".editar").click(function() {
      var idMarca = $(this).attr('data-reg');

      $.ajax({
          type: "POST",
          url: "../controle/marcas_controller.php",
          data: {
              acao: 'busca_info',
              idMarca: idMarca
          },
          success: function(response) {
              console.log(response);
              try {
                  var info = JSON.parse(response);
                  if (info.status === 'erro') {
                      alert('Erro ao buscar Informações');
                  } else {
                      $('#idMarca').val(info[0].idMarca);
                      $('#descriçaoMarca').val(info[0].descricaoMarca);
                      $('.cadastrar').click();
                  }
              } catch (e) {
                  console.error("Erro ao analisar JSON:", e);
                  alert('Erro ao processar a resposta');
              }
          },
          error: function(e) {
              console.log("ERROR : ", e);
          },
      });
  });

  $(".fechar").click(function() {
      $('#idMarca').val('');
      $('#descriçaoMarca').val('');
  });

});

function alterar_status(status, registro) {
  $.ajax({
      type: "POST",
      url: "../controle/marcas_controller.php",
      data: {
          acao: 'alterar_status',
          idMarca: registro,
          status: status
      },
      success: function(response) {
          try {
              var data = JSON.parse(response);
              if (data.status === 'sucesso') {
                  alert('Informação Salva');
                  location.reload();
              } else {
                  alert('Erro ao Salvar');
              }
          } catch (e) {
              console.error("Erro ao analisar JSON:", e);
              alert('Erro ao processar a resposta');
          }
      },
      error: function(e) {
          console.log("ERROR : ", e);
      },
  });
}
