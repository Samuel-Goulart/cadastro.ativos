<html>

<head><!-- cabecalho da pagina com inclusao de scripts e arquivos css -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        /* Estilizando os links de navegação (nav-link) */
        .nav-link {
            color: white!important;
            /* Cor branca para os links */
            min-width: 150px;
            /* Largura mínima para os links, para garantir um tamanho consistente */
            text-align: center;
        }

        /* Estilos aplicados quando o link de navegação é hover (passa o mouse) ou está ativo */
        .nav-link:hover,
        .nav-link.active,
        .navbar-nav .nav-link.show {
            color: white !important;
            /* Garante que a cor dos links permaneça branca, mesmo em hover */
        }

        /* Fazendo o dropdown (menu suspenso) aparecer ao passar o mouse */
        .dropdown:hover .dropdown-menu {
            display: block;
            /* Exibe o menu suspenso quando o mouse passa sobre o dropdown */
        }

        /* Estilizando a barra de navegação (navbar-nav) */
        .navbar-nav {
            /* display: flex; */
            justify-content: space-around;
            /* Distribui os itens de navegação de forma espaçada */
            margin: 0 6% auto;
            /* Margem ao redor da navbar (ajustando para ficar centralizado) */
        }
    </style>

    <html lang="pt-BR">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .logout-btn {
            background-color: transparent;
            color: white;
            border: solid 1px white;
            /* padding: 10px 19px; */
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            margin: 2px;
            text-decoration: none;
            height: 39px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 70px;
        }

        
    </style>
</head>






<body>
    <!-- Barra de navegação principal -->
    <nav class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #17264d;color: white;">
        <!-- Logo do site -->
        <a class="navbar-brand" href="../visao/ativos.php">
            <img src="../css/imagens/logo-SENAC.png" width="80" class="d-inline-block align-top" alt="Logo"> <!-- Logo -->
        </a>

        <!-- Botão para tornar o menu acessível em telas menores (como mobile) -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#user_opt" aria-controls="user_opt" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Conteúdo da barra de navegação (links e menus suspensos) -->
        <div class="collapse navbar-collapse" id="user_opt">
            <ul class="navbar-nav mr-auto">
                <!-- Menu dropdown "Usuários" -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown_submenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Usuários <!-- Título do menu dropdown -->
                    </a>
                    <!-- Itens do menu dropdown "Usuários" -->
                    <ul class="dropdown-menu" aria-labelledby="dropdown_submenu">
                        <li><a class="dropdown-item" href="listar_usuario.php">Listar </a></li> <!-- Link para listar usuários -->
                        <li><a class="dropdown-item" href="tela_cadastro_usuario.php">Cadastrar</a></li> <!-- Link para cadastrar usuário -->
                    </ul>
                </li>

                <!-- Menu dropdown "Cadastros" (não tem submenu no momento) -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown_submenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cadastros
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown_submenu">
                        <li><a class="dropdown-item" href="ativos.php">ativos </a></li>
                        <li><a class="dropdown-item" href="marcas.php">marcas</a></li>
                        <li><a class="dropdown-item" href="tipos.php">tipos</a></li>
                    </ul>

                </li>

                <!-- Link simples para "Movimentações" -->
                <li class="nav-item">
                    <a class="nav-link" href="movimentacoes.php">Movimentações</a> <!-- Link para a página de movimentações -->
                </li>
                <li class="nav-item">
                <a class="nav-link" href="filtros_relatorio.php">Relatório</a> <!-- Link para a página de movimentações -->
                </li>
                <li class="nav-item">
                <a class="nav-link" href="busca_prod_ml.php">produtos</a> <!-- Link para a página de movimentações -->
                </li>
            </ul>

        </div>
        <a href="../controle/logout.php" class="logout-btn">Sair</a> <!-- Botão de logout -->
    </nav>

</body>

</html>