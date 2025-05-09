<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Menu") }}
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                 {{-- {{ __("Cadastro de Categoria") }} --}}
                 <a href="{{ route('categoria.index') }}">Cadastro de Categoria</a>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                 {{-- {{ __("Cadastro de Categoria") }} --}}
                 <a href="{{ route('local.index') }}">Cadastro de Locais de Coleta</a>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                 {{-- {{ __("Cadastro de Categoria") }} --}}
                 <a href="{{ route('item.index') }}">Cadastro de Itens</a>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                 {{-- {{ __("Cadastro de Categoria") }} --}}
                 <a href="{{ route('movimento.index') }}">Movimentação de Itens</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
