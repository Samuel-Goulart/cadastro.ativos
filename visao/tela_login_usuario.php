<?php
session_start();
if (isset($_GET['erro']) && $_GET['erro'] == 'sem_acesso') {
    echo "<script>alert('Usuário não autenticado');</script>";
}
if (isset($_GET['error_auten']) && $_GET['error_auten'] == 's') {
    echo "<script>alert('Senha ou usuário inválido');</script>";
}
include_once('../modelo/conecta_banco_dados.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - Senac</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
    <link rel="stylesheet" href="../css/tela_login.css"> 
</head>
<body>

    <div class="fundo-desfocado"></div>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        
        <div class="login-card">
            <div class="imagem-container">
                <img src="../css/imagens/tela-inicio.jpg" alt="Imagem de início">
            </div>

            <div class="form-container">
                <h1 class="text-center">Bem-vindo</h1>
                <p class="text-center">Faça login para acessar</p>

                <form id="form" action="../controle/tela_login_controle.php" method="POST">
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuário</label>
                        <input type="text" required name="usuario" class="form-control" id="usuario" placeholder="Digite seu usuário">
                    </div>
                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha</label>
                        <input type="password" required name="senha" class="form-control" id="senha" placeholder="Digite sua senha">
                    </div>

                    <div class="botoes">
    <button type="submit" class="btn btn-primary w-100">Entrar</button>
    <a href="tela_cadastro_usuario.php" class="link-cadastro">Cadastre-se</a>
</div>

                </form>
            </div>
        </div>

    </div>

    <script src="../js/validaSenha.js"></script>
</body>
</html>
