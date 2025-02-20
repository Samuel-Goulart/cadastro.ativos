<?php
include_once('../controle/controle_session.php');
include('../modelo/conecta_banco_dados.php');


$nome = $_POST['nome'];
$senha = $_POST['senha'];
$usuario = $_POST['usuario'];
$turma = $_POST['turma'];
$senhamodificada = base64_encode($senha);
$quarry = "
      INSERT INTO USUARIO (
                           nomeUsuario, 
                            usuario,
                            senhaUsuario,
                            turmaUsuario,
                            dataCadastro
                            )values(
                            '" . $nome . "',
                            '" . $usuario . "',
                            '" . $senhamodificada . "',
                            '" . $turma . "',
                            NOW()
                            )
                        
"; //manda para o banco de dados (atraves de uma pesquisa la no sql do banco) as informaçoes cadastradas nomeUsuario=$nome, senhaUsuario=$senha e assim por diante 
$result = mysqli_query($conexao, $quarry) or die(false);
if ($result) {
    echo "<script> alert('usuario cadastrado')</script>";
    header('../visao/ativos.php');
} else {
    echo "<script> alert('falha no cadastro')</script>";
    header('../visao/tela_cadastro_usuario.php');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $senha = $_POST['senha'];

    // Validação da senha no lado do servidor (também pode ser feita com a mesma regex)
    if (preg_match('/^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/', $senha)) {
        // A senha é válida
        echo "Senha válida!";  // Aqui você pode continuar o processamento, como salvar no banco de dados
        
        // Criptografando a senha para armazenar de forma segura
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // Aqui você pode salvar a senha criptografada no banco de dados
        // Exemplo: salvarSenhaNoBanco($senhaHash);
    } else {
        // A senha não atende aos requisitos
        echo "A senha deve ter pelo menos 8 caracteres, uma letra maiúscula e um número.";
    }
}
