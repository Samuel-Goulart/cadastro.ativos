<?php
include_once('../controle/controle_session.php');
include_once('cabecalho.php');
?>

<head>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/menu_superior.css">
    
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
            <li><a class="dropdown-item" href="tipos.php">tipos cadastrados</a></li>
        </ul>
    </div>
</body>