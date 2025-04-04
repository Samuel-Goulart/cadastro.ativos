<?php

include_once('../controle/controle_session.php');
include_once('../modelo/conecta_banco_dados.php');
$json_data = file_get_contents('php://input');
$data=json_decode($json_data,true);
$cargo=isset($_POST['cargo'])?$_POST['cargo']:$data['cargo'];
$acao=isset($_POST['acao'])?$_POST['acao']:$data['acao'];
$user=$_SESSION['id_user'];
if($acao=='gravar_acesso'){
$sql = "SELECT
         idCargo,idOpcao,
         idAcesso,statusAcesso
        FROM acesso
        WHERE  idCargo = '$cargo'";
$result = mysqli_query($conexao, $sql) or die(false);
$acessos = $result->fetch_all(MYSQLI_ASSOC);


$array_acessos_selecionados=[];

foreach($data['acessos'] as $infoAcesso){
    $array_acessos_selecionados[$infoAcesso['idOpcao']]=$infoAcesso['acesso'];
}

$sql = '';
if (!empty($acessos)) {
    foreach ($acessos as $acesso_bd) {
        if (array_key_exists($acesso_bd['idOpcao'], $array_acessos_selecionados)) {
            $sql.= "UPDATE acesso SET statusAcesso = '".$array_acessos_selecionados[$acesso_bd['idOpcao']]."' WHERE idAcesso = '".$acesso_bd['idAcesso']."'; ";
        } else {
            $sql.= "UPDATE acesso SET statusAcesso = 'N' WHERE idAcesso = '".$acesso_bd['idAcesso']."'; ";
        }
        unset($array_acessos_selecionados[$acesso_bd['idOpcao']]);

    }
} 
  
    foreach($array_acessos_selecionados as $idOpcao => $acesso_new){
        $sql.="insert into acesso(
                                    idOpcao,
                                    idCargo,
                                    statusAcesso,
                                    idUsuario,
                                    dataCadastro
                                    )values(
                                    '".$idOpcao."',
                                    '".$cargo."',
                                    '".$acesso_new."',
                                    '".$user."',
                                    now()
                                    ); ";
    }

$sql=substr($sql,0,-2);
$result= mysqli_multi_query($conexao,$sql) or die(false);
if($result){
    echo json_encode("cadastro realizado");
exit();
}

}
if($acao=='buscar_acesso'){
    $sql = "SELECT
         idCargo,idOpcao,
         idAcesso,statusAcesso
        FROM acesso
        WHERE  idCargo = '$cargo'";
$result = mysqli_query($conexao, $sql) or die(false);
$acessos = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($acessos);
}
