<?php
include_once('../controle/controle_session.php');
include_once('cabecalho.php');
?>

<head>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/menu_superior.css">
    <style>
        /* Faz o dropdown abrir no hover */
        .dropdown:hover .dropdown-menu {
            display: block;
        }

        /* Altera o estilo para uma faixa colorida */
        .dropdown {
            background-color: #007bff; /* Cor de fundo da faixa */
            padding: 10px;
            border-radius: 5px;
            width: 100%; /* Faz a faixa ocupar toda a largura disponível */
        }

        /* Estilo dos links dentro da faixa */
        .dropdown-menu {
            background-color: #f8f9fa; /* Cor de fundo para os links */
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }

        .dropdown-menu a {
            color: #007bff; /* Cor do texto dos links */
            text-decoration: none;
            display: block;
            padding: 8px 0;
        }

        .dropdown-menu a:hover {
            background-color: #e9ecef; /* Cor de fundo quando o mouse passa sobre o link */
        }

        /* Estilo do título dentro da faixa */
        .dropdown h7 {
            color: #ffffff; /* Cor do texto do título */
            margin: 0;
        }
    </style>
</head>
<body>

    <!-- Dropdown menu -->
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            USUARIO
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="tela_cadastro_usuario.php">Cadastro</a></li>
            <li><a class="dropdown-item" href="listar_usuario.php">Lista dos usuários</a></li>
            <li><a class="dropdown-item" href="ativos.php">Ativos cadastrados</a></li>
            <li><a class="dropdown-item" href="marcas.php">marcas cadastradas</a></li>
        </ul>
    </div>

</body>
