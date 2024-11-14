<?php
//conexao com o banco de dados 


$conexao=mysqli_connect('localhost','root','','ativo');
//                     hostname,username,password,database

if(!$conexao){
    echo 'falha na conexao';
    exit();
}




?>