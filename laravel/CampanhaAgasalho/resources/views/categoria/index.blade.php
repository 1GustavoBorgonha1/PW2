@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Categorias</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10">
        @if (session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('categoria.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Nova Categoria</a>

        @if (count($categorias) > 0)
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-2">ID</th>
                        <th class="border p-2">Nome</th>
                        <th class="border p-2">Descrição</th>
                        <th class="border p-2">Ações</th> {{-- Nova coluna para as ações --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $cat)
                        <tr>
                            <td class="border p-2">{{ $cat->id }}</td> {{-- Use $cat->id para acessar o atributo --}}
                            <td class="border p-2">{{ $cat->nome }}</td>
                            <td class="border p-2">{{ $cat->descricao }}</td>
                            <td class="border p-2 flex space-x-2">
                                <a href="{{ route('categoria.edit', $cat->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Editar</a>
                                <form action="{{ route('categoria.destroy', $cat->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta categoria?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Nenhuma categoria cadastrada.</p>
        @endif
    </div>
@endsection
