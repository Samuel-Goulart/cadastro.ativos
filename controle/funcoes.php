<?php
function busca_info_bd($conexao, $tabela, $coluna_where = false, $valor_where = false)
{
    $sql = "select * from " . $tabela;

    if ($coluna_where != false) {
        $sql .= " where $coluna_where='" . $valor_where . "' ";
    }

    $result = mysqli_query($conexao, $sql) or die(false);
    $dados = $result->fetch_all(MYSQLI_ASSOC);
    return $dados;
};


function busca_prod_ml($pesquisa)
{
    ini_set('display_errors', 1);
    error_reporting(E_ERROR);
    include('../modelo/conecta_banco_dados.php');
    include('controle_session.php');

    $termo = urlencode($pesquisa);
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
}
