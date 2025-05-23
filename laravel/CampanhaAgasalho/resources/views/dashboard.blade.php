@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900 font-semibold text-xl">
                    {{ __("Menu") }}
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('categoria.index') }}" class="text-blue-600 hover:underline">
                        Cadastro de Categoria
                    </a>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('local.index') }}" class="text-blue-600 hover:underline">
                        Cadastro de Locais de Coleta
                    </a>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('item.index') }}" class="text-blue-600 hover:underline">
                        Cadastro de Itens
                    </a>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('movimento.index') }}" class="text-blue-600 hover:underline">
                        Movimentação de Itens
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection
