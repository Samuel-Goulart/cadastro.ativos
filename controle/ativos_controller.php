<?php
ini_set('display_errors', 1);
error_reporting(E_ERROR);
include('../modelo/conecta_banco_dados.php');
include('controle_session.php');


$ativo = $_POST['descricao_ativo'];
$campo_extra = $_POST['campo_extra'] ?? '';
$marca = $_POST['marca'];
$tipo = $_POST['tipo'];
$quantidade = $_POST['quantidade'];
$quantidadeMin = $_POST['quantidadeMin'];
$observacao = $_POST['observacao'];
$user = $_SESSION['id_user'];
$acao = $_POST['acao'];
$idAtivo = $_POST['idAtivo'];  // Definindo o idAtivo para uso em 'muda_status'
$statusAtivo = $_POST['status'];  // Definindo a variável statusAtivo, que estava ausente
$img = $_FILES['img'];


if ($acao == 'inserir') {
    $pasta_base = $_SERVER['DOCUMENT_ROOT'] . '/cadastro.ativos/img_ativo/';
    if (!file_exists($pasta_base)) {
        mkdir($pasta_base);
    }
    $data = date("YmdHis");
    $tipoImagem = $img['type'];
    $quebraTipo = explode('/', $tipoImagem);
    $extensao = $quebraTipo[1];

    $result = move_uploaded_file($img['tmp_name'], $pasta_base . $data . '.' . $extensao);
    if ($result == false) {
        echo "falha ao mover arquivo";
        exit();
    }
    $urlImg = 'cadastro.ativos/img_ativo/' . $data . '.' . $extensao;



    // Escapando dados para evitar injeção SQL
    $ativo = mysqli_real_escape_string($conexao, $ativo);
    $observacao = mysqli_real_escape_string($conexao, $observacao);

    // Query de inserção
    $query = "
    INSERT INTO ATIVOS (
        descriçaoAtivo,
        quantidadeAtivo,
        quantidadeMinAtivo,
        statusAtivo,
        observaçaoAtivo,
        urlImagem,
        idMarca,
        idTipo,
        dataCadastro,
        usuarioCadastro
    ) VALUES (
        '$ativo',               
        $quantidade,           
        '$quantidadeMin',      
        'S',                    
        '$observacao',          
        '$urlImg',              
        $marca,                 
        $tipo,                  
        NOW(),                  
        '$user'                
    )";


    // Executando a query
    if (mysqli_query($conexao, $query)) {
        echo "Ativo inserido com sucesso.";
    } else {
        echo "Erro ao inserir ativo: " . mysqli_error($conexao);
    }
}

// Ação de Alteração de Status
if ($acao == 'muda_status') {
    // Escapando a variável de statusAtivo
    $statusAtivo = mysqli_real_escape_string($conexao, $statusAtivo);

    // Query de atualização do status
    $sql = "
        UPDATE ATIVOS 
        SET statusAtivo = '$statusAtivo' 
        WHERE idAtivo = $idAtivo
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
    select
        idAtivo,
        descriçaoAtivo,
        quantidadeAtivo,
        quantidadeMinAtivo,	
        dataCadastro,
        observacaoQuantidade,
        statusAtivo,
        observaçaoAtivo,
        idMarca,
        idTipo,
        urlImagem
        from
        ativos
        where
        idAtivo=$idAtivo

        ";

    $result = mysqli_query($conexao, $sql) or die(false);
    $ativo = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($ativo);
    exit();
}
if ($acao == 'update') {
    // 1. Verificar se uma nova imagem foi enviada
    if ($img != null) {
        // Remove a imagem antiga
        $sql_remove = "SELECT urlImagem FROM ativos WHERE idAtivo = $idAtivo";
        $result_remove = mysqli_query($conexao, $sql_remove) or die(false);
        $info = $result_remove->fetch_all(MYSQLI_ASSOC);

        // Caminho para a imagem antiga
        $img_antiga = $_SERVER['DOCUMENT_ROOT'] . '/' . $info[0]['urlImagem'];
        unlink($img_antiga);

        // Diretório para a nova imagem
        $pasta_base = $_SERVER['DOCUMENT_ROOT'] . '/cadastro.ativos/img_ativo/';

        // Gerar nome para a imagem com base na data
        $data = date("YmdHis");
        $tipoImagem = $img['type'];
        $quebraTipo = explode('/', $tipoImagem);
        $extensao = $quebraTipo[1];

        // Mover o arquivo para o diretório correto
        $result = move_uploaded_file($img['tmp_name'], $pasta_base . $data . '.' . $extensao);
        if ($result == false) {
            echo "Falha ao mover arquivo";
            exit();
        }
        // Atualizar o caminho da imagem
        $urlImg = 'cadastro.ativos/img_ativo/' . $data . '.' . $extensao;
        $completa_sql = ", urlImagem='$urlImg'";
    } else {
        $completa_sql = "";
    }


    $campo_extra = $_POST['campo_extra'] ;


    $ativo = $_POST['descricao_ativo'];
    $quantidade = $_POST['quantidade'] ;
    $quantidadeMin = $_POST['quantidadeMin'];
    $observacao = $_POST['observacao'] ;
    $observacaoQuantidade = $_POST['observacaoQuantidade'];
    $idMarca = $_POST['marca'] ;
    $idTipo = $_POST['tipo'];
    $campo_extra = $_POST['campo_extra'];

    $sql = "
        UPDATE ATIVOS SET
            descriçaoAtivo='$ativo',
            observacaoQuantidade='$campo_extra',  
            idMarca='$idMarca',
            idTipo='$idTipo',
            observacaoQuantidade='$campo_extra',
            quantidadeAtivo='$quantidade',
            quantidadeMinAtivo='$quantidadeMin',
            observaçaoAtivo='$observacao'";


    $sql .= $completa_sql;

    // Adicionar a condição de onde a atualização ocorrerá (pelo ID do ativo)
    $sql .= " WHERE idAtivo=$idAtivo";
   

    // 4. Executar a consulta SQL
    $result = mysqli_query($conexao, $sql) or die(false);

    if ($result) {
        echo "Informações alteradas com sucesso!";
    } else {
        echo "Erro ao atualizar as informações.";
    }
}

if ($_POST['acao'] == 'deletar') {
    $idAtivo = $_POST['idAtivo'];
    $sql = "
    DELETE FROM ativos WHERE idAtivo = '$idAtivo'";

    $result = mysqli_query($conexao, $sql) or die(false);
    if ($result) {
        echo "informaçoes Alteradas";
    }
}
