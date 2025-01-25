



$(document).ready(function () {
  $(function () {
      $('[data-toggle="tooltip"]').tooltip()
  })

  $(".salvar").click(function() {
      var tipo = $('#descriçaoTipo').val();
      var idTipo = $('#idTipo').val();

      if (tipo == "") {
          alert('Campo da tipo deve ser preenchido!')
          return;
      }

      var acao = (idTipo == '') ? 'insert' : 'update';

      $.ajax({
          type: "POST",
          url: "../controle/tipos_controller.php",
          data: {
              acao: acao,
              tipo: tipo,
              idTipo: idTipo
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
      var idTipo = $(this).attr('data-reg');
      $('#idTipo').val(idTipo);
      $.ajax({
          type: "POST",
          url: "../controle/tipos_controller.php",
          data: {
              acao: 'busca_info',
              idTipo: idTipo
          },
          success: function(response) {
              console.log(response);
              try {
                  var info = JSON.parse(response);
                  if (info.status === 'erro') {
                      alert('Erro ao buscar Informações');
                  } else {
                      $('.cadastrar').click();
                      $('#descriçaoTipo').val(info[0].descriçaoTipo);
                     
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
      $('#idTipo').val('');
      $('#descriçaoTipo').val('');
  });

});

function alterar_status(status, registro) {
  $.ajax({
      type: "POST",
      url: "../controle/tipos_controller.php",
      data: {
          acao: 'alterar_status',
          idTipo: registro,
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
