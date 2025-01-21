<?php
ini_set('display_errors', 1);
error_reporting(E_ERROR);
include('../modelo/conecta_banco_dados.php');
include('controle_session.php');



$marca = $_POST['marca'];
$user = $_SESSION['id_user'];
$acao = $_POST['acao'];  // Agora a variável $acao é definida corretamente
$idMarca= $_POST['idMarca'];  // Definindo o idAtivo para uso em 'muda_status'

// Ação de Inserção
if ($acao == 'inserir') {
    // Escapando dados para evitar injeção SQL
    $ativo = mysqli_real_escape_string($conexao, $ativo);
    $observacao = mysqli_real_escape_string($conexao, $observacao);

    // Query de inserção
    echo $query = "
        INSERT INTO MARCA (
            descriçaoMarca,
            statusMarca,
            dataCadastro,
            usuarioCadastro
        ) VALUES (
            ' ".$marca."',
            'S',
            NOW(),
            '".$user."'
            
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
if($acao=='get_info'){
     $sql= "
    select
     
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
    
$result=mysqli_query($conexao,$sql)or die(false);
$ativo=$result->fetch_all(MYSQLI_ASSOC);
echo json_encode($ativo);
exit();

}
if($acao=='update'){
    $sql="
        UPDATE ATIVOs SET
        descriçaoAtivo='$ativo',
         idMarca='$marca',
         idTipo='$tipo',
         quantidadeAtivo='$quantidade',
         observaçaoAtivo='$observacao'
         where idAtivo=$idAtivo
    ";

$result=mysqli_query($conexao,$sql)or die(false);
if($result){
    echo"informaçoes Alteradas";
}
}
?>
