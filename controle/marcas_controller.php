<?php
ini_set('display_errors', 0);
error_reporting(E_ERROR);
include('../modelo/conecta_banco_dados.php');
include('controle_session.php');
header('Content-Type: text/plain');

$marca = isset($_POST['marca']) ? $_POST['marca'] : '';
$user = $_SESSION['id_user'];
$acao = isset($_POST['acao']) ? $_POST['acao'] : '';
$idMarca = isset($_POST['idMarca']) ? $_POST['idMarca'] : 0;
$statusMarca = isset($_POST['status']) ? $_POST['status'] : '';

// Ação de Inserção
if ($acao == 'inserir') {
    if ($marca == '') {
        echo 'Marca não fornecida.';
        exit();
    }

    $marca = mysqli_real_escape_string($conexao, $marca);

    // Query de inserção
    $query = "
        INSERT INTO MARCA (
            descriçaoMarca,
            statusMarca,
            dataCadastro,
            usuarioCadastro
        ) VALUES (
            '$marca',
            'S',
            NOW(),
            '$user'
        )";

    // Executando a query
    if (mysqli_query($conexao, $query)) {
        echo'Marca inserida com sucesso.';
    } else {
        echo'Erro ao inserir Marca: ';
    }
}

// Ação de Alteração de Status
if ($acao == 'muda_status') {
    if ($statusMarca == '' || $idMarca == 0) {
        echo 'Status ou ID da marca não fornecido.';
        exit();
    }

    $statusMarca = mysqli_real_escape_string($conexao, $statusMarca);

    // Query de atualização do status
    $sql = "
        UPDATE MARCA
        SET statusMarca = '$statusMarca'
        WHERE idMarca = $idMarca
    ";

    // Executando a query
    if (mysqli_query($conexao, $sql)) {
        echo 'Status alterado com sucesso.';
        exit();
    } else {
        echo'Erro ao alterar status: ';
    }
}

// Ação de Obter Informações
if ($acao == 'get_info') {
    if ($idMarca == 0) {
        echo'ID da marca não fornecido.';
        exit();
    }

    $sql = "
        SELECT descriçaoMarca
        FROM marca
        WHERE idMarca = $idMarca
    ";

    $result=mysqli_query($conexao,$sql)or die(false);
$marca=$result->fetch_all(MYSQLI_ASSOC);
echo json_encode($marca);
exit();
}

// Ação de Update
if ($acao == 'update') {
    if ($marca == '' || $idMarca == 0) {
        echo 'Marca ou ID não fornecido.';
        exit();
    }

    $marca = mysqli_real_escape_string($conexao, $marca);

    $sql = "
        UPDATE marca 
        SET descriçaoMarca = '$marca'
        WHERE idMarca = $idMarca
    ";

    if (mysqli_query($conexao, $sql)) {
        echo 'Informações alteradas com sucesso.';
        exit();
    } else {
        echo 'Erro ao alterar informações: ';
    }
}
