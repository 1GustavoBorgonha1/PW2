@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <!-- Cabeçalho -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Categorias</h2>
                <a href="{{ route('categoria.create') }}"
                   class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">
                    Nova Categoria
                </a>
            </div>

            <!-- Mensagem de sucesso -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Busca -->
            <form action="{{ route('categoria.index') }}" method="GET" class="mb-6 flex">
                <input type="text" name="search" placeholder="Buscar categoria..."
                       value="{{ request('search') }}"
                       class="w-full px-4 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-r-md">
                    Buscar
                </button>
                @if(request('search'))
                    <a href="{{ route('categoria.index') }}"
                       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 ml-2 rounded-md">
                        Limpar
                    </a>
                @endif
            </form>

            <!-- Tabela de categorias -->
            @if ($categorias->count() > 0)
                <table class="min-w-full border">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2 text-left">ID</th>
                            <th class="border px-4 py-2 text-left">Nome</th>
                            <th class="border px-4 py-2 text-left">Descrição</th>
                            <th class="border px-4 py-2 text-left">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorias as $cat)
                            <tr>
                                <td class="border px-4 py-2">{{ $cat->id }}</td>
                                <td class="border px-4 py-2">{{ $cat->nome }}</td>
                                <td class="border px-4 py-2">{{ $cat->descricao ?? '-' }}</td>
                                <td class="border px-4 py-2">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('categoria.edit', $cat->id) }}"
                                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                                            Editar
                                        </a>
                                        <form action="{{ route('categoria.destroy', $cat->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Tem certeza que deseja excluir esta categoria?')"
                                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                                Excluir
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Paginação -->
                <div class="mt-4">
                    {{ $categorias->appends(request()->query())->links() }}
                </div>
            @else
                <div class="text-center py-8">
                    <p class="text-gray-600">Nenhuma categoria cadastrada.</p>
                    @if(request('search'))
                        <p class="text-sm text-gray-500 mt-2">
                            Nenhum resultado encontrado para "{{ request('search') }}"
                        </p>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
