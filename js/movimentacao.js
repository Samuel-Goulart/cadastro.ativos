$(document).ready(function(){
    $("#salva").click(function(){
      let ativo = $("#ativo").val();
      let tipo_mov = $("#tipo_mov").val();
      let quantidade = $("#quantidade").val();
      let origem = $("#origem").val();
      let destino = $("#destino").val();
      let descricao = $("#descricao").val();
      
      if(ativo=="" || tipo_mov=="" || quantidade==""){
        alert('campos obrigatorios nao preenchidos')
        return;
      }
      
      $.ajax({
        type: "POST",
        url:'../controle/movimentacoes.php',
        data:{
            descricao: descrisao,
            ativo:ativo,
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
       //location.reload();
    }});
  }
    function editar(idAtivo){


      
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
      $('#idAtivo').val(idAtivo);
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
      $("#marca").val('');
      $("#tipo").val('');
      $("#quantidade").val('');
      $("#observacao").val('');
      $("#idAtivo").val('');


    }