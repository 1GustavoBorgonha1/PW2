@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Editar Categoria</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-10">
        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categoria.update', $categoria->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="nome" class="block">Nome</label>
                <input type="text" name="nome" id="nome" class="w-full border p-2 rounded" value="{{ $categoria->nome }}" required>
            </div>

            <div>
                <label for="descricao" class="block">Descrição</label>
                <textarea name="descricao" id="descricao" class="w-full border p-2 rounded">{{ $categoria->descricao }}</textarea>
            </div>

            <div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Atualizar</button>
                <a href="{{ route('categoria.index') }}" class="inline-block bg-gray-300 text-gray-700 px-4 py-2 rounded ml-2">Cancelar</a>
            </div>
        </form>
    </div>
@endsection

