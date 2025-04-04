<?php
session_start();
include('../modelo/conecta_banco_dados.php');
include('../controle/funcoes.php');

if (isset($_SESSION['controle_login']) && $_SESSION['controle_login'] == true && isset($_SESSION['login_ok']) && $_SESSION['login_ok'] == true) {
    include('menu_superior.php');
    $escondefundo='';
}else{
    $escondefundo='../css/imagens/tela-inicio.jpg';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>


<style>
    /* Fundo desfocado (mesmo do login) */
.fundo-desfocado {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    background: url('<?php echo $escondefundo; ?>') no-repeat center center;
    background-size: cover;
    filter: blur(8px);
    z-index: -1;
}

.fundo-desfocado::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    background: rgba(0, 0, 0, 0.4);
}
</style>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    
    <!-- Links do Bootstrap e CSS personalizado -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/tela_cadastro.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap">
</head>

<body class="<?php $escondefundo ?>">

    <div class="fundo-desfocado"></div> <!-- Fundo desfocado igual ao login -->

    <div class="container d-flex justify-content-center align-items-center vh-100">
        
        <div class="cadastro-card">
            <h1 class="text-center">Cadastro</h1>
            <p class="text-center">Crie sua conta</p>

            <form id="form" action="../controle/tela_cadastro_usuario_controle.php" method="POST">
                <div class="mb-3">
                    <label for="turma" class="form-label">Turma</label>
                    <input type="text" required name='turma' class="form-control" id="turma" placeholder="Digite sua turma">
                </div>
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuário</label>
                    <input type="text" required name='usuario' class="form-control" id="usuario" placeholder="Digite seu usuário">
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" required name='senha' class="form-control" id="senha" placeholder="Digite sua senha">
                </div>
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" required name='nome' class="form-control" id="nome" placeholder="Digite seu nome">
                </div>
                <div class="mb-3" id="erroSenha"></div>

                <button type="submit" class="btn btn-primary w-100">Enviar</button>
            </form>

            <a href="tela_login_usuario.php" class="link-voltar">Já tem uma conta? Faça login</a>
        </div>
    </div>

    <script src="../js/validaSenha.js"></script>

</body>
</html>
