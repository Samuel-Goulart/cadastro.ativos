<?php
include('../modelo/conecta_banco_dados.php');
include('../controle/funcoes.php');


$usuario= $_POST['usuario'];//puxa la da tela login usuario o valor inserido 
 $senha=$_POST['senha'];//puxa da tela login usuario o valor inserido 
 $senhaCrip=base64_encode($senha);
 $sql="select count(*) as quantidade from usuario where usuario='$usuario' and senhaUsuario= '$senhaCrip'"
 ;//CONSULTA SQL

 $result=mysqli_query($conexao,$sql)or die (false);
 $dados=mysqli_fetch_assoc($result);
 
 if($dados['quantidade']>0){
   echo 'login permitido';
 }else{
   echo 'senha invalida'; 
 }
 
 
 
 
 
 
  
 
 
 
 
 
 /*if (mysqli_num_rows($result) > 0){//so determina se a operaçao foi feita no banco de dados 
    echo 'certo ';
 }else{
    echo 'errado';
 }*/


?>