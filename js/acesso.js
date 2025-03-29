$(document).ready(function () {
  $(".salvarAcesso").click(function () {
    inputs = document.querySelectorAll(".check");
    $(inputs).each(function (index, elemento) {
      array_acesso = [];
      if (array_acesso[index]){
        array_acesso[index]={};
      }
      if ($(elemento).is("checked")) {
        array_acesso[index]['idOpcao']=$(elemento).val();
        array_acesso[index]['acesso']= "S";
      } else {
        array_acesso[index]['idOpcao']=$(elemento).val();
        array_acesso[index]['acesso']= "N";
      }
    });

    cargo = $("cargo").val();
    let array_dados = {};
    array_dados["cargo"] = cargo;
    array_dados["acesso"] = array_acesso;
    console.log(array_dados);
    $.ajax({
      type: "POST",
      url: "../controle/acesso_controller.php",
      contentType: "aplication/json",
      dataType: "json",
      data: JSON.stringify(array_dados),
      success: function (result) {
        alert(result);
        location.reload();
      },
      error: function (error) {
        alert("Erro ao salvar ativo!");
      },
    });
  });
});
