<?php
include_once('../controle/controle_session.php');
include_once('../modelo/conecta_banco_dados.php');
$json_data = file_get_contents('php://input');
$data=json_decode($json_data,true);
$cargo=$data['cargo'];


$sql = "SELECT
         idCargo,idOpcao,
         idAcesso,statusAcesso
        FROM acesso
        WHERE  idCargo = '$cargo'";
$result = mysqli_query($conexao, $sql) or die(false);
$acessos = $result->fetch_all(MYSQLI_ASSOC);
$array_acessos_selecionados=[];
foreach($data['acessos'] as $infoAcesso){
    $array_acessos_selecionados=[$infoAcesso['idOpcao']]=$infoAcesso['acesso'];
}
var_dump(  $array_acessos_selecionados); 


?>