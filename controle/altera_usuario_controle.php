<?php
include_once('../controle/controle_session.php');
include('../modelo/conecta_banco_dados.php');

$nome = $_POST['nome'];
$turma = $_POST['turma'];
$idUsuario = $_POST['idUsuario'];
$cargo = $_POST['cargo'];

$quarry = "
UPDATE USUARIO
SET
    nomeUsuario='" . $nome . "',
    idCargo='" . $cargo . "',
    turmaUsuario='" . $turma . "',
    dataAlteracao= NOW()
    WHERE idUsuario = '" . $idUsuario . "'
    
    
    ";




 

$result = mysqli_query($conexao, $quarry);
if ($result) {
    echo "<script> alert('usuario cadastrado');
    window.location.href='../visao/listar_usuario.php';
    </script>";
} else {
    echo "<script> alert('falha no cadastro')
    window.location.href='../visao/alterar_usuario.php?id_usuario'
    </script>";
}
