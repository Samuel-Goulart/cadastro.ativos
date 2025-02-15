<?php
ini_set('display_errors', 1);
error_reporting(E_ERROR);
include_once('../modelo/conecta_banco_dados.php');
include_once('../controle/funcoes.php');
include_once('../controle/controle_session.php');
include_once('menu_superior.php');

$sql="SELECT
quantidadeAtivo,
quantidadeMinAtivo,
descriçaoAtivo,
(select quantidadeUso from movimentacao m where m.idAtivo= a.idAtivo and m.ststusMov='S') as quantidade_uso
(select descriçaoMarca from marca ma where ma.idMarca= a.idMarca) as descr_marca
from 'ativo' a, ";






$result = mysqli_query($conexao, $sql) or die(false);
$ativo = $result->fetch_all(MYSQLI_ASSOC);
$resultado="";
foreach($ativos as $ativo){
    $quantidade_disponivel= $ativo['quantidadeAtivo']-$ativo['quantidade_uso'];
       if($quantidade_disponivel =$ativo['quantidadeMinAtivo']){
        echo $termo_busca = $ativo['descriçaoAtivo'].'
       }