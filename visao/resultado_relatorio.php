<?php
ini_set('display_errors', 1);
error_reporting(E_ERROR);
include_once('../controle/controle_session.php');
include_once('../modelo/conecta_banco_dados.php');
$title = 'Relatorio gerado';
include_once('menu_superior.php');
include('cabecalho.php');

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
        (SELECT usuario from usuario u where u.idUsuario= m.idUsuario) as usuario, 
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

if ($ativo != '' && $ativo != null) {
    $sql .= " AND m.idAtivo=$ativo";
} else {
    if ($marca != "" && $marca != null) {
        $sql .= " and m.idAtivo in(SELECT idAtivo from ativos a where a.idMarca=$marca )";
    }
    if ($tipo != "" && $tipo != null) {
        $sql .= " and m.idAtivo in(SELECT idAtivo from ativos a where a.idTipo=$tipo )";
    }
}
if ($user != '' && $user != null) {
    $sql .= " AND m.idUsuario=$user";
}
if ($tipoMov != '' && $tipoMov != null) {
    $sql .= " AND m.tipoMovimentacao='$tipoMov'";
}
if ($dataIni != '' && $dataIni != null) {
    $sql .= " AND m.dataMovimentaçao >= '$dataIni'";
}
if ($dataFim != '' && $dataFim != null) {
    $sql .= " AND m.dataMovimentaçao <= '$dataFim'";
}

$result = mysqli_query($conexao, $sql) or die(false);
$dados = $result->fetch_all(MYSQLI_ASSOC);

?>

<body>
    <!--<script src="../js/relatorio.js"></script> -->
        <div class="container">
            <table id=".tabela_export" class="tabela_export" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">descrisao do ativo</th>
                        <th scope="col">tipo</th>
                        <th scope="col">local Origem</th>
                        <th scope="col">local destino</th>
                        <th scope="col">data movimentaçao</th>
                        <th scope="col">descriçao movimentacao</th>
                        <th scope="col">quantidade uso</th>
                        <th scope="col">tipo movimentaçao</th>
                        <th scope="col">quantidade movimentaçao</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($dados as $i) {
                    ?>
                        <tr>
                            <td><?php echo $i['ativos']; ?></td>
                            <td><?php echo $i['usuario']; ?></td>
                            <td><?php echo $i['localOrigem']; ?></td>
                            <td><?php echo $i['localDestino']; ?></td>
                            <td><?php echo $i['dataMovimentaçao']; ?></td>
                            <td><?php echo $i['descriçaoMovimentaçao']; ?></td>
                            <td><?php echo $i['quantidadeUso']; ?></td>
                            <td><?php echo $i['tipoMovimentacao']; ?></td>
                            <td><?php echo $i['quantidadeMov']; ?></td>

                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <input type="hidden" id="idAtivo" value="">

</body>
</div>

<?php

include('modal_movimentacoes.php');
?>