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
    $url = "https://api.mercadolibre.com/sites/MLB/search?q=".$termo.'&condition=new&status=active&sort=best_seller&limit=8';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch,CURLOPT_HTTPHEADER,["Authorization:Bearer APP_USR-5176664781153841-031118-d130da0190774f7d13a23a75f18c867c-455111381","Accept:application/json",]);
    $response = curl_exec($ch);

    if ($response === false) {
        echo "<p>Erro ao acessar o Mercado Livre. Tente novamente mais tarde.</p>";
        curl_close($ch);
        exit();
    }
    curl_close($ch);
    $resultados = json_decode($response, true);
    $retorno="";

    if (!empty($resultados['results'])) {
        
        foreach ($resultados['results'] as $produto) {
            $retorno.= "<div class='produto'>";
            $retorno.= "<h3>" . htmlspecialchars($produto['title']) . "</h3>";
            $retorno.= "<div class='center'>";
            $retorno.= "<img src='" . htmlspecialchars($produto['thumbnail']) . "' alt='Imagem do Produto'>";
            $retorno.= "</div>";
            $retorno.= "<p>Preço: R$" . number_format($produto['price'], 2, ',', '.') . "</p>";
            $retorno.= "<a href='" . htmlspecialchars($produto['permalink']) . "' target='_blank'>Ver no Mercado Livre</a>";
            $retorno.= "</div>";
        }
        
    }
    return $retorno;
}
