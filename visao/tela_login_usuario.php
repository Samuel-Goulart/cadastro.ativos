<?php
session_start();
if (isset($_GET['erro']) && $_GET['erro'] == 'sem_acesso') {
  echo "<script>alert('usuario nao autenticado'); </script>";
}
if (isset($_GET['error_auten']) && $_GET['error_auten'] == 's') {
  echo "<script>alert('senha ou usuario invalido'); </script>";
}
include_once('../modelo/conecta_banco_dados.php');
?>
<DOCTYPE html>

  <head>
    <meta charset="UTF-8">
    <title>Estilizando o Link</title>

    <a>
      <img src="../css/imagens/logo-SENAC.png">
    </a>

    <!--links do bootstrep-->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>LOGIN</title>

    <div class="container">
      <h1>login</h1>
    </div>

  </head>

  <body>
    <div class="container">



      <!--layalt da tela pre pronto do bootstrep-->
      <form id="form" action="../controle/tela_login_controle.php" method="POST">
        <!--(action) diz pra onde vai mandar as informaçoes da tela -->

        <div class="mb-3">
          <label for="usuario" class="form-label">usuario</label>
          <input type="text" required name='usuario' class="form-control" id="usuario" class="form-control">
        </div>
        <div class="mb-3">
          <label for="senha" class="form-label">senha</label>
          <input type="text" required name='senha' class="form-control" id="senha" class="form-control">
        </div>

        <div class="mb-3" id="erroSenha"></div>
        <a class="nav-link" href="tela_cadastro_usuario.php">cadastre-se</a>

        <button onclick="validarSenha()" type="button" class="btn btn-primary">enviar</button>
      </form>
    </div>
    <script src="../js/validaSenha.js"></script>
  </body>
</DOCTYPE>