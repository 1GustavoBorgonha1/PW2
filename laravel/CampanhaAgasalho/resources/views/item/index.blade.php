@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">

            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Itens</h2>
            </div>

            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                <a href="{{ route('item.create') }}"
                   class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md flex items-center gap-2 transition">
                    <i class="fas fa-plus"></i> Novo Item
                </a>

                <form action="{{ route('item.index') }}" method="GET" class="flex gap-2 w-full md:w-auto">
                    <div class="relative flex-grow">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        <input type="text" name="search" placeholder="Buscar item..."
                               value="{{ request('search') }}"
                               class="w-full pl-10 pr-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition">
                        Buscar
                    </button>
                    @if(request('search'))
                        <a href="{{ route('item.index') }}"
                           class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md flex items-center transition">
                            <i class="fas fa-times mr-2"></i> Limpar
                        </a>
                    @endif
                </form>
            </div>

            @if ($itens->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descrição</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoria</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estoque</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($itens as $ite)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $ite->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $ite->nome }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $ite->descricao ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $ite->categoria->nome ?? 'Sem categoria' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $ite->estoque }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center space-x-2">
                                              <a href="{{ route('item.show', $ite->id) }}"
                                               class="inline-flex items-center px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white text-xs rounded transition"
                                               title="Visualizar">
                                                <i class="fas fa-eye mr-1"></i> Ver
                                            </a>
                                            <a href="{{ route('item.edit', $ite->id) }}"
                                            class="inline-flex items-center px-2 py-1 bg-yellow-500 hover:bg-yellow-600 text-white text-xs rounded transition"
                                            title="Editar">
                                                <i class="fas fa-edit mr-1"></i> Editar
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="bg-gray-50 p-8 rounded-md text-center">
                    <i class="fas fa-box-open text-4xl text-gray-400 mb-4"></i>
                    <p class="text-gray-600 text-lg">Nenhum item cadastrado</p>
                    @if(request('search'))
                        <p class="text-sm text-gray-500 mt-2">
                            Nenhum resultado encontrado para "{{ request('search') }}".
                            <a href="{{ route('item.index') }}" class="text-blue-600 hover:underline">Limpar busca</a>
                        </p>
                    @else
                        <a href="{{ route('item.create') }}"
                           class="mt-4 inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-white hover:bg-green-700 transition">
                            <i class="fas fa-plus mr-2"></i> Cadastrar primeiro item
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
