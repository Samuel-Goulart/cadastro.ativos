$(document).ready(function(){
    $("#salva_info").click(function(){
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
        url:'../controle/movimentacao_controller.php',
        data:{
            ativo:ativo,
            tipo_mov:tipo_mov,
            quantidade:quantidade,
            origem:origem,
            destino: destino,  // Envia a ação (inserir ou atualizar)
            descricao: descricao
        },
         success: function(result){
        alert(result);
            if(result=='sucesso'){
                location.reload();
            }
        
      }});
    });
  });
 
    function limpar_modal(){
      $("#ativo").val('');
      $("#tipo_mov").val('');
      $("#quantidade").val('');
      $("#origem").val('');
      $("#destino").val('');
      $("#descricao").val('');


    }