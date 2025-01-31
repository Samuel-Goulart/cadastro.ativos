
<?php
session_start();  // Inicia a sessão

// Destrói a sessão, o que basicamente faz o logout do usuário
session_unset();    // Limpa todas as variáveis de sessão
session_destroy();  // Destroi a sessão

// Redireciona o usuário de volta à página inicial ou para a página de login
header("Location: ../visao/tela_login_usuario.php");
exit();
?>













