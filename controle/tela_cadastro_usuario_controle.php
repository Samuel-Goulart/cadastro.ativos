
<?php
include('../modelo/conecta_banco_dados.php');

$acao = $_POST['acao'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$usuario = $_POST['usuario'];
$turma = $_POST['turma'];
$senhamodificada = base64_encode($senha);
if($acao == 'mudar_status'){
    
    
    
    
    
    
    
    
}else{$quarry = "
      INSERT INTO USUARIO (
                           nomeUsuario, 
                            usuario,
                            senhaUsuario,
                            turmaUsuario,
                            idCargo,
                            dataCadastro
                            )values(
                            '" . $nome . "',
                            '" . $usuario . "',
                            '" . $senhamodificada . "',
                            '" . $turma . "',
                            1,
                            NOW()
                            )
                        
"; //manda para o banco de dados (atraves de uma pesquisa la no sql do banco) as informaçoes cadastradas nomeUsuario=$nome, senhaUsuario=$senha e assim por diante 
$result = mysqli_query($conexao, $quarry) or die(false);
}
if ($result) {
    echo "<script> alert('usuario cadastrado'); 
    window.location.href='../visao/tela_login_usuario.php';
    </script>";
    
    exit;
} else {
    echo "<script> alert('falha no cadastro'); </script>";
    header('Location: ../visao/tela_cadastro_usuario.php');
    exit;
}



session_start();
include('../modelo/conecta_banco_dados.php');
include('../controle/funcoes.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $turma = $_POST['turma'];

    // Função para validar a senha (regras do lado do servidor)
    if (!validarSenha($senha)) {
        $_SESSION['erro'] = 'A senha não atende aos requisitos de segurança.';
        header('Location: ../view/cadastro.php');
        exit();
    }

    
    $senhaCriptografada = password_hash($senha, PASSWORD_BCRYPT);

    
    $query = "INSERT INTO usuarios (usuario, senha, nome, turma) VALUES ('$usuario', '$senhaCriptografada', '$nome', '$turma')";
    $result = mysqli_query($conexao, $query);

    if ($result) {
        $_SESSION['sucesso'] = 'Cadastro realizado com sucesso!';
        header('Location: ../view/sucesso.php');
    } else {
        $_SESSION['erro'] = 'Erro ao cadastrar usuário. Tente novamente!';
        header('Location: ../view/cadastro.php');
    }
}


?>
