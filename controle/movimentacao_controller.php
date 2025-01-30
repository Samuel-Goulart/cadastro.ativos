<?php
ini_set('display_errors', 1);
error_reporting(E_ERROR);
include('../modelo/conecta_banco_dados.php');
include('controle_session.php');


$ativo = $_POST[ 'ativo'];
$tipo_mov = $_POST[ 'tipo_mov'];
$quantidade = $_POST[ 'quantidade'];
$origem = $_POST[ 'origem' ];
$destino = $_POST[ 'destino'];
$descricao = $_POST[ 'descricao' ];
$usuario = $_SESSION[ 'id_user'];
$sqlTotal="
select
quantidadeAtivo 
from
ativos
where
idAtivo=$ativo";
$result=mysqli_query($conexao,$sqlTotal) or die(false);
$ativosTotal = $result->fetch_assoc();
 $quantidadeTotal=$ativosTotal['quantidadeAtivo'];//$quantidadeTotal tudo q tem no estoque ou banco de dados 
 

 $sqlUso="
    SELECT  
     COALESCE(quantidadeUso,0) as quantidadeUso
     FROM
     movimentaçao
     where
     idAtivo=$ativo
     and statusMov='S'   
 ";
 $resultUso=mysqli_query($conexao,$sqlUso) or die(false);
 $ativosUso= $resultUso->fetch_assoc();
$quantidadeUso=isset($ativosUso['quantidadeUso'])?$ativosUso['quantidadeUso']:0;//$quantidadeTotal tudo q tem no estoque ou banco de dados 

 if($tipo_mov=='adicionar'){
    $soma_quantidade=$quantidadeUso+$quantidade;
 if($quantidadeTotal<  $soma_quantidade){
    echo"nao permitido realizar a movimentaçao.quantidade de ativos em uso mais a quantidade ultrapassa o total de ativos cadastrados";
    exit();
    }
 }else if($tipo_mov=='remover'){
    if($quantidadeUso-$quantidade< 0 ){
        echo"Não permitido realizar a movimentação.quantided";
        exit();
    }
    $soma_quantidade=$quantidadeUso-$quantidade;
 }else{
    if($quantidadeUso-$quantidade <0){
        echo"Não permitido realizar a movimentaçao.";
        exit();
    }
    $soma_quantidade=$quantidadeUso;
 }
 
 $queryUpdate="update movimentaçao
 set statusMov='N'
 where idAtivo=$ativo";
 $result=mysqli_query($conexao,$queryUpdate)or die (false);
 $query="insert into movimentaçao(
                        idUsuario,
                        idAtivo,
                        localOrigem,
                        localDestino,
                        dataMovimentaçao,
                        descriçaoMovimentaçao,
                        quantidadeUso,
                        statusMov,
                        tipoMovimentacao,
                        quantidadeMov
                    )values(
                        '" . $usuario . "',
                         '" . $ativo . "',
                          '" . $origem . "',
                           '" . $destino . "',
                            NOW(),
                             '" . $descricao . "',
                              '" . $soma_quantidade . "',
                              'S',
                               '" . $tipo_mov . "',
                                '" . $quantidade . "'
)
";
$result=mysqli_query($conexao,$query) or die(false);
if($result){
   echo'sucesso';
}else{
   echo'erro';

}



