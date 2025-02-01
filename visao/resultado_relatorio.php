<?php
ini_set('display_errors', 1);
error_reporting(E_ERROR);
include_once('../controle/controle_session.php');
include_once('../modelo/conecta_banco_dados.php');
$title = 'Relatorio gerado';
include_once('menu_superior.php');

$ativo = $_POST['ativo'];
$dataIni = $_POST['dataIni'];
$dataFim = $_POST['dataFim'];
$marca = $_POST['marca'];
$tipo = $_POST['tipo'];
$user = $_POST['user'];
$tipoMov = $_POST['tipoMov'];

$sql = "
    SELECT
        (SELECT descriçaoAtivo from ativos a where a.idAtivo= m.idAtivo) as ativos,
        (SELECT usuario from usuario u where u.idUsuario= m.id) as usuario,
        SELECT 
            localOrigem,
            localDestino,
            dataMovimentaçao,
            descriçaoMovimentaçao,
            quantidadeUso,
            tipoMovimentacao,
            quantidadeMov
        FROM movimentaçao m
        
WHERE
idAtivo is not null
";
$sql .= "AND idAtivo=$ativo";
if ($ativo != '' && $ativo != null) {
    $sql .= "AND idAtivo=$ativo";
} else {
    if ($marca != "" && $marca != null) {
        $sql .= "and idAtivo in(SELECT idAtivo from ativos a where a.idMarca=$marca )";
    }
    if ($tipo != "" && $tipo != null) {
        $sql .= "and idAtivo in(SELECT idAtivo from ativos a where a.idTipo=$tipo )";
    }
}
if ($user != '' && $user != null) {
    $sql .= "AND m.idUsuario=$user";
}
if ($tipoMov != '' && $tipoMov != null) {
    $sql .= "AND m.tipoMovimentacao=$tipoMov";
}
if ($dataIni != '' && $dataIni != null) {
    $sql .= "AND m.dataMovimentaçao > '$dataIni'";
}
if ($dataFim != '' && $dataFim != null) {
    $sql .= "AND m.dataMovimentaçao < '$dataFim'";
}

//exit();
