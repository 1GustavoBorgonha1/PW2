@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
            <div class="p-6 flex items-center space-x-4">
                <div class="bg-blue-100 p-3 rounded-full">
                    <i class="fas fa-car text-blue-600 text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Sistema de Veículos</h1>
                    <p class="text-gray-600">Gerencie sua frota de veículos</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="{{ route('marca.index') }}" class="group">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-full transition-all duration-300 hover:shadow-md hover:border-blue-500 border-2 border-transparent">
                    <div class="p-6 flex items-start space-x-4">
                        <div class="bg-green-100 p-3 rounded-full text-green-600">
                            <i class="fas fa-tag text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800 group-hover:text-blue-600">Marcas</h2>
                            <p class="text-gray-600 mt-2">Gerencie as marcas de veículos</p>
                            <div class="mt-4 text-sm text-blue-600 flex items-center">
                                Acessar <i class="fas fa-arrow-right ml-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{ route('veiculo.index') }}" class="group">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg h-full transition-all duration-300 hover:shadow-md hover:border-blue-500 border-2 border-transparent">
                    <div class="p-6 flex items-start space-x-4">
                        <div class="bg-purple-100 p-3 rounded-full text-purple-600">
                            <i class="fas fa-car-side text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800 group-hover:text-blue-600">Veículos</h2>
                            <p class="text-gray-600 mt-2">Gerencie todos os veículos cadastrados</p>
                            <div class="mt-4 text-sm text-blue-600 flex items-center">
                                Acessar <i class="fas fa-arrow-right ml-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
