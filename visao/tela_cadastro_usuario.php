<?php
session_start();
include('../modelo/conecta_banco_dados.php');
include('../controle/funcoes.php');

if (isset($_SESSION['controle_login']) && $_SESSION['controle_login'] == true && isset($_SESSION['login_ok']) && $_SESSION['login_ok'] == true) {
    include('menu_superior.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/tela_cadastro.css">
    
    <!-- Links do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body style="background-color:rgb(165 168 169);">
    <div class="container">  
        <h1>Cadastro</h1>
        
        <!-- Formulário de Cadastro -->
        <form id="form" action="../controle/tela_cadastro_usuario_controle.php" method="POST">
            <div class="mb-3">
                <label for="turma" class="form-label">Turma</label>
                <input type="text" required name='turma' class="form-control" id="turma">
            </div>
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuário</label>
                <input type="text" required name='usuario' class="form-control" id="usuario">
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" required name='senha' class="form-control" id="senha">
            </div>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" required name='nome' class="form-control" id="nome">
            </div>
            <div class="mb-3" id="erroSenha"></div>
            <button onclick="validarSenha()" type="button" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    <script src="../js/validaSenha.js"></script>
</body>
</html>
