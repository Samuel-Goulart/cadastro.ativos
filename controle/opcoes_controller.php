<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);
include('controle_session.php');
include('classe_opcoes.php');
include('../modelo/conecta_banco_dados.php');


$opcoes = $_POST['opcao'];
$usuario = $_SESSION['id_user'];
$nivelOpcao_js = $_POST['nivelOpcao_js'];
$url = $_POST['url'];
$status = $_POST['statusOpcao'];
$idOpcao = $_POST['idOpcao'];
$acao=$_POST['acao'];


$classeOpcoes= new opcoes();

if($acao=='insert'){

    $classeOpcoes->insert($conexao,$opcoes,$usuario,$nivelOpcao_js,$url);
    
}else if($acao=='alterar_status'){
   
    $classeOpcoes->alterar_status($conexao,$idOpcao,$status);

}else if($acao=='busca_info'){

    $classeOpcoes->get_info($conexao,$idOpcao);

}else if($acao=='deletar_opcao'){

    $classeOpcoes->deletar_opcao($conexao,$idOpcao);
    
}else if($acao=='alterar_opcao'){

    $classeOpcoes->alterar_opcao($conexao,$opcoes,$nivelOpcao_js,$url,$idOpcao);
    
}


?>
