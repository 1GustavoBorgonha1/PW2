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

        <style>
            :root {
                --color-primary: #E74C3C;
                --color-secondary: #3498DB;
                --color-dark: #2C3E50;
                --color-light: #ECF0F1;
                --color-text: #333333;
                --color-white: #FFFFFF;
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
                justify-content: flex-end;
                gap: 1rem;
            }

            .hero {
                background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
                background-size: cover;
                background-position: center;
                color: var(--color-white);
                padding: 4rem 2rem;
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

            .card {
                background-color: var(--color-white);
                border-radius: var(--radius);
                box-shadow: 0 4px 6px rgba(0,0,0,0.1);
                padding: 2rem;
                margin-bottom: 2rem;
            }

            .card h2 {
                color: var(--color-primary);
                margin-bottom: 1rem;
            }

            .footer {
                background-color: var(--color-dark);
                color: var(--color-white);
                text-align: center;
                padding: 2rem 0;
                margin-top: 2rem;
            }

            @media (max-width: 768px) {
                .nav {
                    flex-direction: column;
                    align-items: center;
                }

                .hero h1 {
                    font-size: 2rem;
                }
            }
        </style>
    </head>
    <body>
        <header class="header">
            <div class="container">
                @if (Route::has('login'))
                    <nav class="nav">
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
                    </nav>
                @endif
            </div>
        </header>

        <main class="container">
            <section class="hero">
                <h1>Campanha do Agasalho 2023</h1>
                <p>Ajude a aquecer quem mais precisa neste inverno. Sua doação faz a diferença!</p>
                <a href="/campanhaagasalho" class="btn btn-primary">Quero Ajudar</a>
            </section>

            <section class="card">
                <h2>Sobre a Campanha</h2>
                <p>A Campanha do Agasalho é uma iniciativa que busca arrecadar roupas, cobertores e outros itens para ajudar pessoas em situação de vulnerabilidade durante o período de inverno. Todos os anos, milhares de pessoas são beneficiadas com as doações.</p>
                <p>Neste ano, nossa meta é arrecadar 10.000 itens para distribuição em comunidades carentes de nossa região.</p>
            </section>
    </body>
</html>
