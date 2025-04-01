<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo ao Site de Cadastro do Senac!</title>
    <style>
        /* Estilos da tela de início */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }

        .hero {
            height: 100vh;
            background: url('sua-imagem-de-fundo.jpg') no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #918a8a;
            text-align: center;
            flex-direction: column;
        }

        .hero h1 {
            font-size: 4rem;
            margin: 0;
        }

        .hero p {
            font-size: 1.5rem;
            margin: 20px 0;
        }

        .btn {
            background-color: #007BFF;
            color: white;
            padding: 15px 30px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        nav {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        nav a {
            color: #918a8a;
            font-size: 1.2rem;
            margin-right: 15px;
            text-decoration: none;
        }

        nav a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <!-- Navegação -->
    <nav>
        <a href="#">Início</a>
        <a href="#">Sobre</a>
        <a href="#">Contato</a>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Bem-vindo ao Site de Cadastros do Senac!</h1>
        <p>Faça login para explorar.</p>
        <a href="#explore" class="btn">Explorar Agora</a>
    </div>

</body>
</html>
