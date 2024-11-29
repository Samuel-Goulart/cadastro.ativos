<?php
include_once('../controle/controle_session.php');
include('../modelo/conecta_banco_dados.php');


$nome= $_POST['nome'];
$senha= $_POST['senha'];
$usuario= $_POST['usuario'];
$turma= $_POST['turma'];
$senhamodificada=base64_encode($senha);
$quarry="
      INSERT INTO USUARIO (
                           nomeUsuario, 
                            usuario,
                            senhaUsuario,
                            turmaUsuario,
                            dataCadastro
                            )values(
                            '".$nome."',
                            '".$usuario."',
                            '".$senhamodificada."',
                            '".$turma."',
                            NOW()
                            )
                        
";//manda para o banco de dados (atraves de uma pesquisa la no sql do banco) as informaçoes cadastradas nomeUsuario=$nome, senhaUsuario=$senha e assim por diante 
$result=mysqli_query($conexao,$quarry)or die(false);
if($result){
    echo"<script> alert('usuario cadastrado')</script>";
    header('../visao/listar_usuario.php');
}else{
    echo"<script> alert('falha no cadastro')</script>";
    header('../visao/tela_cadastro_usuario.php');
}



?>