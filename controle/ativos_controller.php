<?php
ini_set('display_errors', 0);
error_reporting(E_ERROR);
include('../modelo/conecta_banco_dados.php');
include('controle_session.php');


$ativo = $_POST['ativo'];
$marca = $_POST['marca'];
$tipo = $_POST['tipo'];
$quantidade = $_POST['quantidade'];
$observacao = $_POST['observacao'];
$user = $_SESSION['id_user'];
$acao = $_POST['acao'];  // Agora a variável $acao é definida corretamente
$idAtivo = $_POST['idAtivo'];  // Definindo o idAtivo para uso em 'muda_status'
$statusAtivo = $_POST['status'];  // Definindo a variável statusAtivo, que estava ausente
$img=$_FILES['img'];


 if($acao=='inserir'){
    $pasta_base=$_SERVER['DOCUMENT_ROOT'].'/projeto_final/cadastro.ativos/img_ativo/';
    if(!file_exists($pasta_base)){
        mkdir($pasta_base);
    }
    $data= date("YmdHis");
    $tipoImagem=$img ['type'];
    $quebraTipo= explode('/',$tipoImagem);
    $extensao = $quebraTipo[1];

    $result=move_uploaded_file($img['tmp_name'],$pasta_base . $date . '.' . $extensao);
    if ($result== false){
        echo"falha ao mover arquivo";
        exit();
    }
    $urlImg= 'projeto_final/cadastro.ativos/img_ativo/'. $data . '.' . $extensao;
 

 
    // Escapando dados para evitar injeção SQL
    $ativo = mysqli_real_escape_string($conexao, $ativo);
    $observacao = mysqli_real_escape_string($conexao, $observacao);

    // Query de inserção
    $query = "
        INSERT INTO ATIVOS (
            descriçaoAtivo,
            quantidadeAtivo,
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
            'S',
            '$observacao',
           ' $urlImg',
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
        observaçaoAtivo,
        idMarca,
        idTipo
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
    $sql = "
        UPDATE ATIVOs SET
        descriçaoAtivo='$ativo',
         idMarca='$marca',
         idTipo='$tipo',
         quantidadeAtivo='$quantidade',
         observaçaoAtivo='$observacao'
         where idAtivo=$idAtivo
    ";

    $result = mysqli_query($conexao, $sql) or die(false);
    if ($result) {
        echo "informaçoes Alteradas";
    }
}
