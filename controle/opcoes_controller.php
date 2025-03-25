<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);
include('controle_session.php');
include('classe_opcoes.php');
include('../modelo/conecta_banco_dados.php');


$opcoes = $_POST['opcao'];
$usuario = $_SESSION['id_user'];
$nivelOpcao_js = $_POST['idNivel'];
$url = $_POST['url'];
$status = $_POST['status'];
$idOpcao = $_POST['idOpcao'];
$idSuperior = $_POST['idSuperior'];
$vinculado = $_POST['vinculado'];
$acao=$_POST['acao'];


$classeOpcoes= new opcoes();

if($acao=='insert'){

    $resultado=$classeOpcoes->insert($conexao,$opcoes,$usuario,$nivelOpcao_js,$url,$idSuperior);
    
}else if($acao=='alterar_status'){
   
    $resultado=$classeOpcoes->alterar_status($conexao,$idOpcao,$status);

}else if($acao=='busca_info'){

    $resultado=$classeOpcoes->get_info($conexao,$idOpcao);

}else if($acao=='deletar'){

    $resultado= $classeOpcoes->deletar_opcao($conexao,$idOpcao);
    
}else if($acao=='update'){

    $resultado=$classeOpcoes->alterar_opcao($conexao,$opcoes,$nivelOpcao_js,$url,$idOpcao,$vinculado); 
    
}else if($acao=='busca_superior'){
$resultado=$classeOpcoes->busca_superior($conexao,$nivelOpcao_js);
} echo $resultado;


?>
