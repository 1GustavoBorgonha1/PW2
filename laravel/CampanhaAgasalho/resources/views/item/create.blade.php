@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Novo Item</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-10">
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <!-- Campo Nome -->
            <div>
                <label for="nome" class="block text-sm font-medium text-gray-700">Nome do Item *</label>
                <input type="text" name="nome" id="nome"
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                       value="{{ old('nome') }}" required>
            </div>

            <!-- Campo Descrição -->
            <div>
                <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
                <textarea name="descricao" id="descricao" rows="3"
                          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('descricao') }}</textarea>
            </div>

            <!-- Campo Categoria -->
            <div>
                <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoria *</label>
                <select name="categoria_id" id="categoria_id"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">Selecione uma categoria</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Campo Imagem -->
            <div>
                <label for="imagem" class="block text-sm font-medium text-gray-700">Imagem do Item *</label>
                <div class="mt-1 flex items-center">
                    <input type="file" name="imagem" id="imagem"
                           class="focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>
                <p class="mt-2 text-sm text-gray-500">
                    Formatos aceitos: JPEG, PNG, JPG (Máx. 2MB)
                </p>
            </div>

            <!-- Botões -->
            <div class="flex justify-end space-x-3">
                <a href="{{ route('item.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                    Cancelar
                </a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Salvar Item
                </button>
            </div>
        </form>
    </div>
@endsection
