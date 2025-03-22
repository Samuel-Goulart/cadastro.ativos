<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);
session_start();
date_default_timezone_set('America/Sao_Paulo');
include('../modelo/conecta_banco_dados.php');
//$tipo = mysqli_real_escape_string($conexao, $_POST['descriçaotipo']);
//$idTipo = mysqli_real_escape_string($conexao, $_POST['idTipo']);
//header('Content-Type: application/json');


$acao = $_POST['acao'];
$tipo = $_POST['tipo'];
$idTipo = $_POST['idTipo'];
$usuario = $_SESSION['id_user'];
$status = $_POST['status'];

if ($acao == 'insert') {
    // Código para inserir a tipo
    $query = "
        INSERT INTO tipo (
            descriçaoTipo,
            statusTipo,
            dataCadastro,
            usuarioCadastro
        ) VALUES (
            '" . $tipo . "',
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
    // Código para atualizar a tipo
    $query = "UPDATE tipo SET descriçaoTipo = '$tipo' WHERE idTipo = $idTipo";
    $result = mysqli_query($conexao, $query);
    if ($result) {
        echo json_encode(['status' => 'sucesso']); // Retorna sucesso como JSON
    } else {
        echo json_encode(['status' => 'erro']); // Retorna erro como JSON
    }
} elseif ($acao == 'busca_info') {
    // Código para buscar informações da tipo
    $query = "SELECT idTipo, descriçaoTipo FROM tipo WHERE idTipo = $idTipo";
    $result = mysqli_query($conexao, $query);
    if ($result) {
        $dados = $result->fetch_all(MYSQLI_ASSOC); // Pega todos os dados da consulta
        echo json_encode($dados); // Retorna os dados da tipo como JSON
    }
} elseif ($acao == 'alterar_status') {
    // Código para alterar o status da tipo
    $query = "UPDATE tipo SET statusTipo = '$status' WHERE idTipo = $idTipo";
    $result = mysqli_query($conexao, $query);
    if ($result) {
        echo json_encode(['status' => 'sucesso']); // Retorna sucesso como JSON
    } else {
        echo json_encode(['status' => 'erro']); // Retorna erro como JSON
    }
}
if ($_POST['acao'] == 'deletar') {
    $idTipo = $_POST['idTipo'];
    $sql = "
    DELETE FROM tipo WHERE idTipo = '$idTipo'";

    $result = mysqli_query($conexao, $sql) or die(false);
    if ($result) {
        echo "informaçoes Alteradas";
    }
}
