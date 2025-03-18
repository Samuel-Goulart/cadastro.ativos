<?php
include('controle_session.php');
include('classe_opcoes.php');
include('../modelo/conecta_banco_dados.php');


$acao=$_POST['acao'];
$classeOpcoes= new opcoes();
if($acao=='insert'){

    $classeOpcoes->insert($conexao,$valor1,$valor2,$valor3);

}else if($acao=='alterar_status'){

    $classeOpcoes->alterar_status($conexao,$idOpcao);

}else if($acao=='get_info'){

    $classeOpcoes->get_info($conexao,$idOpcao);

}else if($acao=='deletar_opcao'){

    $classeOpcoes->deletar_opcao($conexao,$idOpcao);
    
}else if($acao=='alterar_opcao'){

    $classeOpcoes->alterar_opcao($conexao,$idOpcao,$valores,$usuario);
    
}


?>
