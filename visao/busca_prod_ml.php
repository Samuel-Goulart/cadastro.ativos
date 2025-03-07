<head>
    <title>Produtos com Baixo Estoque</title>

    <link rel="stylesheet" href="../css/requisicao_cUrl.css">

</head>
<?php
//ini_set('display_errors', 1);
//error_reporting(E_ERROR);
include_once('../modelo/conecta_banco_dados.php');
include_once('../controle/funcoes.php');
include_once('../controle/controle_session.php');
include_once('menu_superior.php'); ?>

<body style="background-color: rgb(165 168 169);">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600&display=swap" rel="stylesheet">

    <div class="h1">
        <h1 style="margin-top: 40px; font-family: 'Montserrat', sans-serif;">Produtos com Baixo Estoque</h1>

    </div>

<?php
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
$ativos = $result->fetch_all(MYSQLI_ASSOC);  // Aqui usamos o nome correto da variável
$resultado = "";

foreach ($ativos as $ativo) {
    $quantidade_disponivel = $ativo['quantidadeAtivo'] - $ativo['quantidade_uso'];

    // Corrigido para comparar corretamente
    if ($quantidade_disponivel < $ativo['quantidadeMinAtivo']) {
        $termo_busca = $ativo['descriçaoAtivo'] . ' ' . $ativo['descr_marca'];
        $resultado .= busca_prod_ml($termo_busca);
    }
}
?>
<div class='produto-container'>
    <?php ($resultado);
    if($resultado==""){
        echo'sem ativos para repor';
    }else{
        echo $resultado;
    } ?> </div>
</body>