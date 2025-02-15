<link rel="stylesheet" href="../css/requisicao_cUrl.css">

<?php
ini_set('display_errors', 1);
error_reporting(E_ERROR);
include('../modelo/conecta_banco_dados.php');
include('controle_session.php');

$termo = urlencode('celular');
$url = "https://api.mercadolibre.com/sites/MLB/search?q=$termo";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

if ($response === false) {
    echo "<p>Erro ao acessar o Mercado Livre. Tente novamente mais tarde.</p>";
    curl_close($ch);
    exit();
}

curl_close($ch);
$resultados = json_decode($response, true);

if (!empty($resultados['results'])) {
    echo "<div class='produto-container'>"; // Abre o container dos produtos
    foreach ($resultados['results'] as $produto) {
        echo "<div class='produto'>";
        echo "<h3>" . htmlspecialchars($produto['title']) . "</h3>";
        echo "<div class='center'>";
echo "<img src='" . htmlspecialchars($produto['thumbnail']) . "' alt='Imagem do Produto'>";
echo "</div>";
        echo "<p>Preço: R$" . number_format($produto['price'], 2, ',', '.') . "</p>";
        echo "<a href='" . htmlspecialchars($produto['permalink']) . "' target='_blank'>Ver no Mercado Livre</a>";
        echo "</div>";
    }
    echo "</div>"; // Fecha o container dos produtos
} else {
    echo "<p>Nenhum produto encontrado.</p>";
}
?>
