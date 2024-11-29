<?php
include('../modelo/conecta_banco_dados.php');
include('controle_session.php');
$ativo=$_POST['ativo'];
$marca=$_POST['marca'];
$tipo=$_POST['tipo'];
$quantidade=$_POST['quantidade'];
$observaçao=$_POST['observaçao'];
$user=$_SESSION['id_user'];
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
$result=mysqli_query($conexao,$quarry)or die(false);
if($result){
        echo"cadastro realizado";
}
?>