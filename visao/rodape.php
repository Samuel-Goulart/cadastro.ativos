<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de Rodapé Condicional</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1;
        }
        
        footer {
            margin-top: 92px; 
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(10px);
            color: white;
            padding: 50px 0; 
            display: none; /* Inicialmente oculto */
            position: relative;
            width: 100%;
        }

        .footer-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            max-width: 1100px;
            margin: auto;
            text-align: left;
        }

        .footer-section {
            flex: 1;
            min-width: 250px;
            margin: 10px;
        }

        .footer-section h5 {
            color: #f4a261;
            margin-bottom: 15px;
        }

        .footer-section a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section a:hover {
            color: #f4a261;
        }

        /* Ícones sociais */
        .social-icons a {
            font-size: 24px;
            color: white;
            margin: 0 10px;
            transition: transform 0.3s, color 0.3s;
        }

        .social-icons a:hover {
            color: #f4a261;
            transform: scale(1.2);
        }

        /* Rodapé inferior */
        .footer-bottom {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            background: rgba(0, 0, 0, 0.3);
            padding: 10px 0;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .footer-container {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>
<body>

    <div class="main-content">
        <!-- Conteúdo da página (adicione mais conteúdo aqui para testar o scroll) -->
        <p>Conteúdo da página. Adicione mais conteúdo para testar o scroll.</p>
    </div>

    <footer id="rodape">
        <div class="footer-container">
            <!-- Horário de Funcionamento -->
            <div class="footer-section">
                <h5>Horário de funcionamento</h5>
                <p>Segunda a sexta-feira: 07:00 às 22:00 <br> Sábado: 09:00 às 12:00.</p>
            </div>

            <!-- Contato -->
            <div class="footer-section">
                <h5>Contato</h5>
                <p><i class="bi bi-telephone"></i> (51) 3715-9335</p>
                <p><i class="bi bi-geo-alt"></i> Venâncio Aires, 300, Centro <br> Santa Cruz do Sul - RS</p>
            </div>

            <!-- Links Rápidos -->
            <div class="footer-section">
                <h5>Links Rápidos</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Início</a></li>
                    <li><a href="#">Serviços</a></li>
                    <li><a href="#">Sobre</a></li>
                    <li><a href="#">Contato</a></li>
                </ul>
            </div>
        </div>

        <!-- Redes Sociais -->
        <div class="text-center social-icons">
            <a href="https://pt-br.facebook.com/senacsantacruz/"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/senacsantacruz/"><i class="bi bi-instagram"></i></a>
            <a href="https://www.linkedin.com/school/senac-rs/"><i class="bi bi-linkedin"></i></a>
        </div>

        <!-- Direitos Autorais -->
        <div class="footer-bottom">
            <p>&copy; Senac 2025. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script>
        // Função para verificar se o usuário chegou ao final da página
        window.addEventListener("scroll", function() {
            let rodape = document.getElementById("rodape");

            // Verificar se o usuário chegou ao final da página
            if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
                rodape.style.display = "block";  // Exibe o rodapé
            } else {
                rodape.style.display = "none";  // Oculta o rodapé
            }
        });
    </script>

</body>
</html>
