<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);
session_start();
date_default_timezone_set('America/Sao_Paulo');
include('../modelo/conecta_banco_dados.php');


$acao = $_POST['acao'];
$marca = $_POST['marca'];
$idMarca = $_POST['idMarca'];
$usuario = $_SESSION['id_user'];
$status = $_POST['status'];

if ($acao == 'insert') {
    // Código para inserir a marca
    $query = "
        INSERT INTO marca (
            descriçaoMarca,
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
    $query = "UPDATE marca SET descriçaoMarca = '$marca' WHERE idMarca = $idMarca";
    $result = mysqli_query($conexao, $query);
    if ($result) {
        echo json_encode(['status' => 'sucesso']); // Retorna sucesso como JSON
    } else {
        echo json_encode(['status' => 'erro']); // Retorna erro como JSON
    }
} elseif ($acao == 'busca_info') {
    // Código para buscar informações da marca
    $query = "SELECT idMarca, descriçaoMarca FROM marca WHERE idMarca = $idMarca";
    $result = mysqli_query($conexao, $query);
    if ($result) {
        $dados = $result->fetch_all(MYSQLI_ASSOC); // Pega todos os dados da consulta
        echo json_encode($dados); // Retorna os dados da marca como JSON
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
if ($_POST['acao'] == 'deletar') {
    $idMarca = $_POST['idMarca'];
    $sql = "
    DELETE FROM marca WHERE idMarca = '$idMarca'";

    $result = mysqli_query($conexao, $sql) or die(false);
    if ($result) {
        echo "informaçoes Alteradas";
    }
}

