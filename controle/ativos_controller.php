<?php
ini_set('display_errors',0);
error_reporting(E_ERROR);
include('../modelo/conecta_banco_dados.php');
include('controle_session.php');
$ativo=$_POST['ativo'];
$marca=$_POST['marca'];
$tipo=$_POST['tipo'];
$quantidade=$_POST['quantidade'];
$observaçao=$_POST['observaçao'];
$user=$_SESSION['id_user'];
$tipo=$_POST['acao'];
$idAtivo=$_POST['idAtivo'];

if($acao== 'INSERT'){
$quarry="
        INSERT INTO ATIVOS (
                           descriçaoAtivo,
                           quantidadeAtivo,
                           statusAtivo,
                           observaçaoAtivo,
                           idMarca,
                           idTipo,
                           dataCadastro,
                           usuarioCadastro
                           )values(
                           '".$ativo."',
                           ".$quantidade.",
                           'S',
                           '".$observaçao."',
                           ".$marca.",
                           ".$tipo.",
                         
                           NOW(),
                           '".$user."'
                            )";


if($acao=='muda_status'){
        $sql="
        update ativo set statusAtivo='$statusAtivo' where idAtivo=$idAtivo
        ";
}
$result=mysqli_query($conexao,$sql)or die(false);
if($result){
        echo"status alterado";
}
}
?>