<?php
//include_once('../controle/controle_session.php');
session_start();
include('../modelo/conecta_banco_dados.php');
include('../controle/funcoes.php');


$usuario = $_POST['usuario']; //puxa la da tela login usuario o valor inserido 
$senha = $_POST['senha']; //puxa da tela login usuario o valor inserido 
$senhaCrip = base64_encode($senha);
$sql = "select 
      count(*) as quantidade, idUsuario, admin  
      from usuario  
      where usuario='$usuario' and senhaUsuario= '$senhaCrip'"; //CONSULTA SQL

$result = mysqli_query($conexao, $sql) or die(false);
$dados = mysqli_fetch_assoc($result);

if ($dados['quantidade'] > 0) {
  $_SESSION['login_ok'] = true;
  $_SESSION['controle_login'] = true;
  $_SESSION['id_user'] = $dados['idUsuario'];
  if ($dados["admin"] == "S") {
    $_SESSION['admin'] = 'S';
  } else {
    $_SESSION['admin'] = 'Ns';
  }
  header('location:../visao/ativos.php');
} else {
  $_SESSION['login_ok'] = false;
  unset($_SESSION['controle_login']);
  header('location:../visao/tela_login_usuario.php?error_auten=s');
}
var_dump($dados);