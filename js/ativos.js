$(document).ready(function(){
    $("#salva_info").click(function(){
      let descricao_ativo = $("#ativo").val();
      let marca = $("#marca").val();
      let tipo = $("#tipo").val();
      let quantidade = $("#quantidade").val();
      let observacao = $("#observacao").val();
      let idAtivo = $("#idAtivo").val();
      if(idAtivo==""){
        acao='inserir';
      }else{
        acao='update';
      }
      $.ajax({
        type: "POST",
        url:'../controle/ativos_controller.php',
        data:{
            ativo:descricao_ativo,
            marca:marca,
            tipo:tipo,
            quantidade:quantidade,
            observacao:observacao,
            acao: acao,  // Envia a ação (inserir ou atualizar)
            idAtivo: idAtivo
        },
         success: function(result){
        alert(result);
        location.reload();
      }});
    });
  });
  // Função para mudar o status do ativo
  function muda_status(status,idAtivo){
    $.ajax({
      type: "POST",
      url:'../controle/ativos_controller.php',
      data:{
          acao:'muda_status',
          status:status,
          idAtivo:idAtivo
          
      },
       success: function(result){
        console.log(result)
        alert(result);
       location.reload();
    }});
  }