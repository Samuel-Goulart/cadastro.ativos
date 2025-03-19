

$(document).ready(function () {
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
  
    $(".salvar").click(function() {
        var opcao = $('#descricaoOpcao').val();
        var idOpcao = $('#idOpcao').val();
        var nivelOpcao_js = $('#nivelOpcao_js').val();
        var url = $('#url').val();
  
        if (opcao == "") {
            alert('Campo da opcao deve ser preenchido!')
            return;
        }
  
        var acao = (idOpcao == '') ? 'insert' : 'update';
  
        $.ajax({
            type: "POST",
            url: "../controle/opcoes_controller.php",
            data: {
                acao: acao,
                opcao: opcao,
                idOpcao: idOpcao,
                nivelOpcao_js : nivelOpcao_js,
                url:url
            },
            success: function(response) {
                console.log(response);
                try {
                    var data = JSON.parse(response);
                    if (data.status === 'sucesso') {
                        alert('Informação Salva');
                       //location.reload();
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
        var idOpcao = $(this).attr('data-reg');
        $('#idOpcao').val(idOpcao);
        $.ajax({
            type: "POST",
            url: "../controle/opcoes_controller.php",
            data: {
                acao: 'busca_info',
                idOpcao: idOpcao
            },
            success: function(response) {
                console.log(response);
                try {
                    var info = JSON.parse(response);
                    if (info.status === 'erro') {
                        alert('Erro ao buscar Informações');
                    } else {
                        $('.cadastrar').click();
                        $('#descricaoOpcao').val(info[0].descricaoOpcao);
                       
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
        $('#idOpcao').val('');
        $('#descricaoOpcao').val('');
    });
  
  });
  
  function alterar_status(status, idOpcao) {
    $.ajax({
        type: "POST",
        url: "../controle/opcoes_controller.php",
        data: {
            acao: 'alterar_status',
            idOpcao: idOpcao,
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
  
function deletar(idOpcao) {

    if (confirm("Tem certeza que deseja excluir este ativo?")) {
      $.ajax({
        type: "POST",
        url: "../controle/ativos_controller.php",
        data: {
          acao: "deletar",
          idOpcao: idOpcao,
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
    $("#idOpcao").val("");
    $("#descricaoOpcao").val("");
    $("#nivelOpcao_js").val("");
    $("#url").val("");
    $("#observacao").val("");
    $("#idAtivo").val("");
    $("#quantidadeMin").val("");
  
    $("#imgAtivo").val("");
    $("#img_previer").attr("src", ""); 
    $(".div_previer").hide(); 
    $('.modal_ativos').attr('editar','N')
  }