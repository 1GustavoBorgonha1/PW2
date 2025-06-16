<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GerencieVeículos</title>

        <!-- Fontes -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

        <!-- Ícones -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-50 font-sans text-gray-900 min-h-screen">
        <!-- Cabeçalho -->
        <header class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 py-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-car text-blue-600 text-xl"></i>
                </div>

                <nav class="flex items-center space-x-6">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600 transition">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-blue-600 transition">
                                Entrar
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md transition">
                                    Registrar
                                </a>
                            @endif
                        @endauth
                    @endif
                </nav>
            </div>
        </header>

        <!-- Conteúdo Principal -->
        <main>
            <div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">GerencieVeículos</h1>
                    <p class="text-gray-600 max-w-2xl mx-auto">
                        Sistema de gerenciamento de veículos e marcas
                    </p>
                </div>

                <!-- Cards de Funcionalidades -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-md mx-auto">
                    <!-- Card Marcas -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div class="bg-blue-100 p-3 rounded-full mr-4">
                                    <i class="fas fa-tag text-blue-600"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900">Marcas</h3>
                            </div>
                            <p class="text-gray-600 mb-6">
                                Gerencie as marcas de veículos cadastradas
                            </p>
                            <a href="{{ route('marca.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                                Acessar <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Card Veículos -->
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div class="bg-green-100 p-3 rounded-full mr-4">
                                    <i class="fas fa-car text-green-600"></i>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900">Veículos</h3>
                            </div>
                            <p class="text-gray-600 mb-6">
                                Controle todos os veículos cadastrados
                            </p>
                            <a href="{{ route('veiculo.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                                Acessar <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
