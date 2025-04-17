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
        margin-top: 80px; /* Distância entre o rodapé e o conteúdo */
        background: rgba(0, 0, 0, 0.6); /* Preto translúcido */
        backdrop-filter: blur(10px); /* Efeito vidro fosco */
        color: #17264d;
        padding: 15px 0; /* Reduzindo o padding */
    }

    .footer-container {
        display: flex;
        justify-content: space-between; /* Usando space-between para espaçar mais uniformemente */
        flex-wrap: wrap;
        max-width: 900px; /* Reduzindo a largura do contêiner */
        margin: auto;
        text-align: left;
    }

    /* Seções do rodapé */
    .footer-section {
        flex: 1;
        min-width: 200px; /* Reduzindo o tamanho mínimo das seções */
        margin: 5px; /* Menos espaço entre as seções */
    }

    .footer-section h5 {
        color: #f4a261;
        margin-bottom: 10px; /* Menor margem abaixo dos títulos */
    }

    /* Links estilizados */
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
        font-size: 20px; /* Reduzindo o tamanho dos ícones */
        color: white;
        margin: 0 8px; /* Menor margem entre os ícones */
        transition: transform 0.3s, color 0.3s;
    }

    .social-icons a:hover {
        color: #f4a261;
        transform: scale(1.2);
    }

    /* Rodapé inferior */
    .footer-bottom {
        text-align: center;
        margin-top: 15px; /* Menor margem superior */
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

<footer>
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
