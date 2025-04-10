<?php
session_start();
include('cabecalho.php');
include('../modelo/conecta_banco_dados.php');
$cargo = $_SESSION['idCargo'];
$sqlMenu = "SELECT 
    idOpcao,
    descricaoOpcao,
    urlOpcao
FROM 
    opcoes_menu O
WHERE 
    nivelOpcao = 1
    AND statusOpcao = 'S'
    AND idOpcao IN (
        SELECT idOpcao 
        FROM acesso A 
        WHERE A.idOpcao = O.idOpcao 
        AND statusAcesso = 'S' 
        AND idCargo = $cargo
    )
";
$result = mysqli_query($conexao, $sqlMenu) or die(false);
$acessos_menu = $result->fetch_all(MYSQLI_ASSOC);


?>

<html>

<head><!-- cabecalho da pagina com inclusao de scripts e arquivos css -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <style>
        .nav-link {
            color: white !important;

            min-width: 150px;

            text-align: center;
        }


        .nav-link:hover,
        .nav-link.active,
        .navbar-nav .nav-link.show {
            color: white !important;

        }

        .dropdown:hover .dropdown-menu {
            display: block;

        }


        .navbar-nav {

            justify-content: space-around;
            margin: 0 6% auto;
            /* Margem ao redor da navbar (ajustando para ficar centralizado) */
        }
    </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary"style="background-color: #17264d;color: white;">
        <div class="container-fluid"style="background-color: #17264d;color: white;">
            <a class="navbar-brand" href="#">logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?php
                        foreach ($acessos_menu as $acesso) {
                            $sqlSUB_Menu = "SELECT 
                            idOpcao,
                            descricaoOpcao,
                            urlOpcao
                        FROM 
                            opcoes_menu O
                        WHERE 
                            idSuperior = '" . $acesso['idOpcao'] . "'
                            AND statusOpcao = 'S'
                            AND idOpcao IN (
                                SELECT idOpcao 
                                FROM acesso A 
                                WHERE A.idOpcao = O.idOpcao 
                                AND statusAcesso = 'S' 
                                AND idCargo = $cargo
                            )
                        ";
                            $resultSUB_Menu = mysqli_query($conexao, $sqlSUB_Menu) or die(false);
                            $acessos_SUBmenu = $resultSUB_Menu->fetch_all(MYSQLI_ASSOC);
                            if(count($acessos_SUBmenu) > 0) {
                        ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $acesso['descricaoOpcao']; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                                foreach ($acessos_SUBmenu as $sub_Menu) {
                                    echo '<li><a class="dropdown-item" href="' . $sub_Menu['urlOpcao'] . '">' . $sub_Menu['descricaoOpcao'] . '</a></li>';
                                }
                            ?>
                        </ul>
                    </li>
            <?php

                            } else {
                                echo ' <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="' . $acesso['urlOpcao'] . '">' . $acesso['descricaoOpcao'] . '</a>
        </li>';
                            }
                        }
            ?>

                </ul>
            </div>
        </div>
    </nav>
    </body>
    </html>

    <!--
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

    <nav class="navbar navbar-expand-lg navbar-light px-5" style="background-color: #17264d;color: white;">

        <a class="navbar-brand" href="../visao/ativos.php">
            <img src="../css/imagens/logo-SENAC.png" width="80" class="d-inline-block align-top" alt="Logo">
        </a>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#user_opt" aria-controls="user_opt" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="user_opt">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown_submenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Usuários
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdown_submenu">
                        <li><a class="dropdown-item" href="listar_usuario.php">Listar </a></li> 
                        <li><a class="dropdown-item" href="tela_cadastro_usuario.php">Cadastrar</a></li> 
                    </ul>
                </li>

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

                <li class="nav-item">
                    <a class="nav-link" href="movimentacoes.php">Movimentações</a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="filtros_relatorio.php">Relatório</a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="busca_prod_ml.php">produtos</a> 
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="opcoes.php">opções</a> 
                </li>
            </ul>

        </div>
        <a href="../controle/logout.php" class="logout-btn">Sair</a>  Botão de logout 
    </nav>

    </body>

</html>-->