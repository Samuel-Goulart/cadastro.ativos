<?php
ini_set('display_errors', 1);
error_reporting(E_ERROR);
include_once('../modelo/conecta_banco_dados.php');
include_once('../controle/funcoes.php');
include_once('../controle/controle_session.php');
include_once('menu_superior.php');
$sql = "
SELECT
    quantidadeAtivo,
    quantidadeMinAtivo,
    descriçaoAtivo,
    (SELECT quantidadeUso FROM movimentaçao m WHERE m.idAtivo = a.idAtivo AND m.statusMov = 'S') AS quantidade_uso,
    (SELECT descriçaoMarca FROM marca ma WHERE ma.idMarca = a.idMarca) AS descr_marca
FROM
    `ativos` a";






$result = mysqli_query($conexao, $sql) or die(false);
$ativo = $result->fetch_all(MYSQLI_ASSOC);
$resultado = "";
foreach ($ativos as $ativo) {
    $quantidade_disponivel = $ativo['quantidadeAtivo'] - $ativo['quantidade_uso'];
    if ($quantidade_disponivel = $ativo['quantidadeMinAtivo']) {
        echo $termo_busca = $ativo['descriçaoAtivo'] . '' . $ativo['descr_marca'];
        $resultado .= busca_prod_ml($termo_busca);
    }
};
