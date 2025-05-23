<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Ícones (Font Awesome) -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
    <body class="font-sans antialiased flex flex-col min-h-screen">
        <div class="flex-grow">
            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="pb-8">
                @yield('content')
            </main>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-800 text-gray-300 mt-auto">
            <div class="max-w-5xl mx-auto px-6 py-12 text-center">
                <!-- Título e mensagem -->
                <h3 class="text-white text-2xl font-semibold mb-4">Campanha do Agasalho</h3>
                <p class="text-base mb-6 max-w-xl mx-auto">
                    Um simples gesto pode aquecer o inverno de quem mais precisa. Doe agasalhos e espalhe solidariedade!
                </p>

                <!-- Contatos -->
                <div class="space-y-4 text-sm">
                    <div class="flex items-center justify-center space-x-2">
                        <i class="fas fa-map-marker-alt text-gray-400"></i>
                        <span>Praça 25 de Julho, 1 - Centro, Rio do Sul - SC, 89160-900</span>
                    </div>
                    <div class="flex items-center justify-center space-x-2">
                        <i class="fas fa-phone-alt text-gray-400"></i>
                        <span>(47) 9999-9999</span>
                    </div>
                    <div class="flex items-center justify-center space-x-2">
                        <i class="fas fa-envelope text-gray-400"></i>
                        <span>contato@teste.com</span>
                    </div>
                </div>

                <!-- Redes Sociais -->
                <div class="flex justify-center mt-6 space-x-6 text-xl">
                    <a href="https://www.facebook.com/PrefeituraRiodoSul/?locale=pt_BR" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="http://x.com/prefriodosul" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.instagram.com/prefeiturariodosul/" class="text-gray-400 hover:text-white transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>

                <!-- Créditos -->
                <p class="text-xs text-gray-500 mt-8">&copy; {{ date('Y') }} Campanha do Agasalho. Todos os direitos reservados.</p>
            </div>
        </footer>
    </body>
</html>
