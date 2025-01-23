<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
include('../modelo/conecta_banco_dados.php');
$marca = mysqli_real_escape_string($conexao, $_POST['descriçaoMarca']);
$idMarca = mysqli_real_escape_string($conexao, $_POST['idMarca']);
header('Content-Type: application/json');

ini_set('display_errors', 1);
error_reporting(E_ALL);
$acao = $_POST['acao'];
$marca = $_POST['descriçaoMarca'];
$idMarca = $_POST['idMarca'];
$usuario = $_SESSION['id_user'];
$status = $_POST['statusMarca'];

if ($acao == 'insert') {
    // Código para inserir a marca
    $query = "
        INSERT INTO marca (
            descricaoMarca,
            statusMarca,
            dataCadastro,
            usuarioCadastro
        ) VALUES (
            '" . $marca . "',
            'S',
            NOW(),
            '" . $usuario . "'
        )
    ";
    $result = mysqli_query($conexao, $query);
    if ($result) {
        echo json_encode(['status' => 'sucesso']); // Retorna sucesso como JSON
    } else {
        echo json_encode(['status' => 'erro']); // Retorna erro como JSON
    }
} elseif ($acao == 'update') {
    // Código para atualizar a marca
    $query = "UPDATE marca SET descricaoMarca = '$marca' WHERE idMarca = $idMarca";
    $result = mysqli_query($conexao, $query);
    if ($result) {
        echo json_encode(['status' => 'sucesso']); // Retorna sucesso como JSON
    } else {
        echo json_encode(['status' => 'erro']); // Retorna erro como JSON
    }
} elseif ($acao == 'busca_info') {
    // Código para buscar informações da marca
    $query = "SELECT idMarca, descricaoMarca FROM marca WHERE idMarca = $idMarca";
    $result = mysqli_query($conexao, $query);
    if ($result) {
        $dados = $result->fetch_all(MYSQLI_ASSOC); // Pega todos os dados da consulta
        echo json_encode($dados); // Retorna os dados da marca como JSON
    } else {
        echo json_encode(['status' => 'erro', 'message' => 'Erro ao buscar informações']); // Retorna erro como JSON
    }
} elseif ($acao == 'alterar_status') {
    // Código para alterar o status da marca
    $query = "UPDATE marca SET statusMarca = '$status' WHERE idMarca = $idMarca";
    $result = mysqli_query($conexao, $query);
    if ($result) {
        echo json_encode(['status' => 'sucesso']); // Retorna sucesso como JSON
    } else {
        echo json_encode(['status' => 'erro']); // Retorna erro como JSON
    }
}
?>
