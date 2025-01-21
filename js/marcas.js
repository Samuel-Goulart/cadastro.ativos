$(document).ready(function(){
    $(".salvar").click(function(){
      let marca = $("#descriçaoMarca").val();
      let idMarca = $("#idMarca").val();
      
      if(idMarca==""){
        acao='inserir';
      }else{
        acao='update';
      }
      $.ajax({
        type: "POST",
        url:'../controle/marcas_controller.php',
        data:{
            marca:marca,
            acao: acao,  // Envia a ação (inserir ou atualizar)
            idMarca: idMarca
        },
         success: function(result){
        alert(result);
        //location.reload();
      }});
    });
  });
  // Função para mudar o status do ativo 
  /*
  function muda_status(status,idAtivo){
    $.ajax({
      type: "POST",
      url:'../controle/marcas_controller.php',
      data:{
          acao:'muda_status',
          status:status,
          idMarca: idMarca
          
      },
       success: function(result){
        console.log(result)
        alert(result);
       location.reload();
    }});
  }
    function editar(idAtivo){

      $('#idAtivo').val(idAtivo);
      
      $.ajax({
        type: "POST",
        url:'../controle/ativos_controller.php',
        data:{
            acao:'get_info',
            
            idAtivo:idAtivo
            
        },
         success: function(result){
          retorno=JSON.parse(result)
      $('#btn_modal').click();
      $("#ativo").val(retorno[0]['descriçaoAtivo']);
      $("#marca").val(retorno[0]['idMarca']);
      $("#tipo").val(retorno[0]['idTipo']);
      $("#quantidade").val(retorno[0]['quantidadeAtivo']);
      $("#observacao").val(retorno[0]['observaçaoAtivo']);
      
       

      
      console.log(retorno)
          
      }});
    }
    function limpar_modal(){
      $("#ativo").val('');
      //$("#marca").val('');
      //$("#tipo").val('');
      $("#quantidade").val('');
      $("#observacao").val('');
      $("#idAtivo").val('');


    }*/