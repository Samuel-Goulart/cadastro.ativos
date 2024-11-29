$(document).ready(function(){
    $("#salva_info").click(function(){
      let descricao_ativo = $("#ativo").val();
      let marca = $("#marca").val();
      let tipo = $("#tipo").val();
      let quantidade = $("#quantidade").val();
      let observaçao = $("#observaçao").val();
      $.ajax({
        type: "POST",
        url:'../controle/ativos_controller.php',
        data:{
            ativo:descricao_ativo,
            marca:marca,
            tipo:tipo,
            quantidade:quantidade,
            observaçao:observaçao
        },
         success: function(result){
        alert(result);
        location.reload();
      }});
    });
  });