<?php

class opcoes
{
   public function insert($conexao, $opcoes, $usuario, $valor3)
   {

      // Código para inserir a marca
      $query = "
    INSERT INTO marca (
        descricaoOpcao,
        statusOpcao,
        dataCadastroOpcaol,
        usuarioCadastro
    ) VALUES (
        '" . $opcoes . "',
        'S',
        NOW(),
        '" . $usuario . "'
    )
";
      $result = mysqli_query($conexao, $query);
      if ($result) {
         echo json_encode(['status' => 'sucesso']);
      } else {
         echo json_encode(['status' => 'erro']);
      }
   }


   public function alterar_status($conexao, $idOpcao)
   {

      $query = "UPDATE marca SET statusMarca = '$status' WHERE idMarca = $idOpcao";
      $result = mysqli_query($conexao, $query);
      if ($result) {
         echo json_encode(['status' => 'sucesso']);
      } else {
         echo json_encode(['status' => 'erro']);
      }
   }




   public function get_info($conexao, $idOpcao)
   { // Código para buscar informações da marca
      $query = "SELECT idMarca, descriçaoMarca FROM marca WHERE idMarca = $idOpcao";
      $result = mysqli_query($conexao, $query);
      if ($result) {
         $dados = $result->fetch_all(MYSQLI_ASSOC); // Pega todos os dados da consulta
         echo json_encode($dados); // Retorna os dados da marca como JSON
      }
   }
   public function deletar_opcao($conexao, $idOpcao) { 
      $idOpcao = $_POST['idOpcao'];
      $sql = "
      DELETE FROM opcoes_menu WHERE idOpcao = '$idOpcao'
  ";
  $result = mysqli_query($conexao, $sql);
  if ($result) {
     echo json_encode(['status' => 'sucesso']);
  } else {
     echo json_encode(['status' => 'erro']);
  }
}
   public function alterar_opcao($conexao, $idOpcao, $valores, $usuario) {}
}
