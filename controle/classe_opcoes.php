<?php

class opcoes
{
   public function insert($conexao, $opcoes, $usuario, $nivelOpcao_js, $url)
   {

      // Código para inserir a marca
      $query = "
    INSERT INTO opcoes_menu (
        descricaoOpcao,
        statusOpcao,
        nivelOpcao,
        urlOpcao,
        dataCadastroOpcao,
        idUsuario
    ) VALUES (
        '" . $opcoes . "',
        'S',
        '" . $nivelOpcao_js . "',
        '" . $url . "',
        NOW(),
        '" . $usuario . "'
    )
";
      $result = mysqli_query($conexao, $query);
      if ($result) {
         return json_encode(['status' => 'sucesso']);
      } else {
         return  json_encode(['status' => 'erro']);
      }
   }










   public function alterar_status($conexao, $idOpcao, $status)
   {

      $query = "UPDATE opcoes_menu SET statusOpcao = '$status' WHERE idOpcao  = $idOpcao";
      $result = mysqli_query($conexao, $query);
      if ($result) {
         return json_encode(['status' => 'sucesso']);
      } else {
         return json_encode(['status' => 'erro']);
      }
   }




   public function get_info($conexao, $idOpcao,)
   {
      $query = "SELECT idOpcao, descricaoOpcao,nivelOpcao,urlOpcao FROM opcoes_menu WHERE idOpcao = $idOpcao";
      $result = mysqli_query($conexao, $query);
      if ($result) {
         $dados = $result->fetch_all(MYSQLI_ASSOC); 
         return json_encode($dados); 
      }
   }
   public function deletar_opcao($conexao, $idOpcao)
   {

      $sql = "
      DELETE FROM opcoes_menu WHERE idOpcao = '$idOpcao'
  ";
      $result = mysqli_query($conexao, $sql);
      if ($result) {
         return json_encode(['status' => 'sucesso']);
      } else {
         return json_encode(['status' => 'erro']);
      }
   }
   public function alterar_opcao($conexao, $opcoes, $nivelOpcao_js, $url, $idOpcao)
   {
       $query = "UPDATE opcoes_menu
       SET descricaoOpcao = '$opcoes',
        nivelOpcao = '$nivelOpcao_js',
         urlOpcao = '$url'
       WHERE idOpcao = $idOpcao";
      $result = mysqli_query($conexao, $query);
      if ($result) {
         return json_encode(['status' => 'sucesso']); // Retorna sucesso como JSON
      } else {
         return json_encode(['status' => 'erro']); // Retorna erro como JSON
      }
   }
   public function busca_superior($conexao,$nivel)
{
   $sql ="
   SELECT descricaoOpcao, idOpcao
   FROM opcoes_menu
   WHERE nivelOpcao = $nivel";

   $result = mysqli_query($conexao, $sql) or die(false);
   $opcoes = $result->fetch_all(MYSQLI_ASSOC);
   return json_encode($opcoes);
}
}
