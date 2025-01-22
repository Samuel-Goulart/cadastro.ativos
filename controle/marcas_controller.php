<?php
ini_set('display_errors', 0);
error_reporting(E_ERROR);
include('../modelo/conecta_banco_dados.php');
include('controle_session.php');
header('Content-Type: application/json');



$marca = $_POST['marca'];
$user = $_SESSION['id_user'];
$acao = $_POST['acao'];  // Agora a variável $acao é definida corretamente
$idMarca = $_POST['idMarca'];  // Definindo o idAtivo para uso em 'muda_status'

// Ação de Inserção
if ($acao == 'inserir') {
    // Escapando dados para evitar injeção SQL
    $marca = mysqli_real_escape_string($conexao, $marca);
    $observacao = mysqli_real_escape_string($conexao, $observacao);

    // Query de inserção
    $query = "
        INSERT INTO MARCA (
            descriçaoMarca,
            statusMarca,
            dataCadastro,
            usuarioCadastro
        ) VALUES (
            ' " . $marca . "',
            'S',
            NOW(),
            '" . $user . "'
            
        )";

    // Executando a query
    if (mysqli_query($conexao, $query)) {
        echo "Marca inserido com sucesso.";
    } else {
        echo "Erro ao inserir Marca: " . mysqli_error($conexao);
    }
}

// Ação de Alteração de Status
if ($acao == 'muda_status') {
    // Escapando a variável de statusMarca
    $statusMarca = mysqli_real_escape_string($conexao, $statusMarca);

    // Query de atualização do status
    $sql = "
        UPDATE MARCA
        SET statusMarca= '$statusMarca' 
        WHERE idMarca= $idMarca
    ";

    // Executando a query
    if (mysqli_query($conexao, $sql)) {
        echo "Status alterado com sucesso.";
    } else {
        echo "Erro ao alterar status: " . mysqli_error($conexao);
    }
}
if ($acao == 'get_info') {
    $sql = "
    SELECT
        descriçaoMarca
    FROM
        marca
    WHERE
        idMarca = $idMarca
";


    $result = mysqli_query($conexao, $sql) or die(false);
    $marca = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($marca);
    exit();
}



if ($acao == 'update') {
    $sql = "
        UPDATE 
            marca 
        SET
            descriçaoMarca='$marca'
        where 
            idMarca=$idMarca
    ";

    $result = mysqli_query($conexao, $sql) or die(false);
    if ($result) {
        echo "informaçoes Alteradas";
    }
}
