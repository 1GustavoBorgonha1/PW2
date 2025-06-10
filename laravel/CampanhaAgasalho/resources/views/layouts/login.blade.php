<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Campanha do Agasalho</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <style>
            :root {
                --color-primary: #E74C3C;
                --color-secondary: #3498DB;
                --color-dark: #2C3E50;
                --color-light: #ECF0F1;
                --color-text: #333333;
                --color-white: #FFFFFF;
                --color-gray-800: #2D3748;
                --color-gray-300: #CBD5E0;
                --color-gray-400: #A0AEC0;
                --color-gray-500: #718096;
                --spacing: 1rem;
                --radius: 8px;
            }

            * {
                box-sizing: border-box;
                margin: 0;
                padding: 0;
            }

            body {
                font-family: 'Montserrat', sans-serif;
                background-color: var(--color-light);
                color: var(--color-text);
                line-height: 1.6;
                min-height: 100vh;
                display: flex;
                flex-direction: column;
            }

            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: var(--spacing);
            }

            .btn {
                display: inline-block;
                padding: 0.75rem 1.5rem;
                border-radius: var(--radius);
                font-weight: 600;
                text-align: center;
                text-decoration: none;
                transition: all 0.3s ease;
                cursor: pointer;
            }

            .btn-primary {
                background-color: var(--color-primary);
                color: var(--color-white);
                border: 2px solid var(--color-primary);
            }

            .btn-primary:hover {
                background-color: transparent;
                color: var(--color-primary);
            }

            .btn-outline {
                background-color: transparent;
                color: var(--color-primary);
                border: 2px solid var(--color-primary);
            }

            .btn-outline:hover {
                background-color: var(--color-primary);
                color: var(--color-white);
            }

            .header {
                background-color: var(--color-white);
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
                padding: 1rem 0;
            }

            .nav {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .logo {
                font-weight: 700;
                font-size: 1.5rem;
                color: var(--color-primary);
                text-decoration: none;
            }

            .nav-links {
                display: flex;
                gap: 1rem;
            }

            .hero {
                background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
                background-size: cover;
                background-position: center;
                color: var(--color-white);
                padding: 6rem 2rem;
                text-align: center;
                border-radius: var(--radius);
                margin: 2rem 0;
            }

            .hero h1 {
                font-size: 2.5rem;
                margin-bottom: 1rem;
            }

            .hero p {
                font-size: 1.2rem;
                max-width: 800px;
                margin: 0 auto 2rem;
            }

            .section-title {
                text-align: center;
                margin: 3rem 0 2rem;
                color: var(--color-dark);
            }

            .cards {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 2rem;
                margin: 2rem 0;
            }

            .card {
                background-color: var(--color-white);
                border-radius: var(--radius);
                box-shadow: 0 4px 6px rgba(0,0,0,0.1);
                padding: 2rem;
                transition: transform 0.3s ease;
            }

            .card:hover {
                transform: translateY(-5px);
            }

            .card h3 {
                color: var(--color-primary);
                margin-bottom: 1rem;
                font-size: 1.25rem;
            }

            .card-icon {
                font-size: 2rem;
                color: var(--color-primary);
                margin-bottom: 1rem;
            }

            .how-to-help {
                background-color: var(--color-white);
                padding: 3rem 0;
                margin: 3rem 0;
            }

            /* Footer Styles */
            footer {
                background-color: var(--color-gray-800);
                color: var(--color-gray-300);
                margin-top: auto;
            }

            .footer-container {
                max-width: 72rem;
                margin: 0 auto;
                padding: 3rem 1.5rem;
                text-align: center;
            }

            footer h3 {
                color: var(--color-white);
                font-size: 1.5rem;
                font-weight: 600;
                margin-bottom: 1rem;
            }

            footer p {
                font-size: 1rem;
                margin-bottom: 1.5rem;
                max-width: 36rem;
                margin-left: auto;
                margin-right: auto;
            }

            .contact-info {
                display: flex;
                flex-direction: column;
                gap: 1rem;
                font-size: 0.875rem;
                margin-bottom: 1.5rem;
            }

            .contact-item {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 0.5rem;
            }

            .contact-item i {
                color: var(--color-gray-400);
            }

            .social-links {
                display: flex;
                justify-content: center;
                gap: 1.5rem;
                font-size: 1.25rem;
                margin-top: 1.5rem;
            }

            .social-links a {
                color: var(--color-gray-400);
                transition: color 0.3s ease;
            }

            .social-links a:hover {
                color: var(--color-white);
            }

            .copyright {
                font-size: 0.75rem;
                color: var(--color-gray-500);
                margin-top: 2rem;
                padding-top: 2rem;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
            }

            @media (max-width: 768px) {
                .nav {
                    flex-direction: column;
                    gap: 1rem;
                }

                .nav-links {
                    flex-direction: column;
                    align-items: center;
                }

                .hero {
                    padding: 4rem 1rem;
                }

                .hero h1 {
                    font-size: 2rem;
                }

                .cards {
                    grid-template-columns: 1fr;
                }
                .content-text {
                    text-align: justify;
                    margin-bottom: 1rem;
                    line-height: 1.6;
                }
                
            }
        </style>
    </head>
    <body>
        <header class="header">
            <div class="container">
                <nav class="nav">
                    <a href="/" class="logo">Campanha do Agasalho</a>
                    <div class="nav-links">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-outline">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline">
                                    Entrar
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-primary">
                                        Cadastrar
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </nav>
            </div>
        </header>

        <main class="container">
            <section class="hero">
                <h1>Campanha do Agasalho</h1>
                <p>Ajude a aquecer quem mais precisa neste inverno. Sua doação faz a diferença!</p>                <a href="/campanhaagasalho" class="btn btn-primary">Quero Ajudar</a>
            </section>

            <section>
                <h2 class="section-title">Como você pode ajudar</h2>
                <div class="cards">
                    <div class="card">
                        <div class="card-icon">🧥</div>
                        <h3>Doe Agasalhos</h3>
                        <p class="content-text">Roupas, cobertores e acessórios em bom estado que possam aquecer quem precisa.</p>
                    </div>
                </div>
            </section>

            <section class="how-to-help">
                <div class="container">
                    <div class="card">
                        <h2>Sobre a Campanha</h2>
                        <p class="content-text">A Campanha do Agasalho é uma iniciativa que busca arrecadar roupas, cobertores e outros itens para ajudar pessoas em situação de vulnerabilidade durante o período de inverno. Todos os anos, milhares de pessoas são beneficiadas com as doações.</p>
                        <p class="content-text">Nossa missão é reduzir o impacto do frio nas populações mais carentes, garantindo que todos tenham acesso a agasalhos adequados durante os meses mais rigorosos do inverno.</p>
                    </div>
                </div>
            </section>
        </main>

        <footer>
            <div class="footer-container">

                <h3>Campanha do Agasalho</h3>
                <p>
                    Um simples gesto pode aquecer o inverno de quem mais precisa. Doe agasalhos e espalhe solidariedade!
                </p>


                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Praça 25 de Julho, 1 - Centro, Rio do Sul - SC, 89160-900</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone-alt"></i>
                        <span>(47) 9999-9999</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>contato@teste.com</span>
                    </div>
                </div>


                <div class="social-links">
                    <a href="https://www.facebook.com/PrefeituraRiodoSul/?locale=pt_BR">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="http://x.com/prefriodosul">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.instagram.com/prefeiturariodosul/">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>


                <p class="copyright">&copy; {{ date('Y') }} Campanha do Agasalho. Todos os direitos reservados.</p>
            </div>
        </footer>
    </body>
</html>
