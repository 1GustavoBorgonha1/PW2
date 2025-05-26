@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <!-- Cabeçalho -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Movimentos</h2>
                <a href="{{ route('movimento.create') }}"
                   class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md flex items-center gap-2 transition">
                    <i class="fas fa-plus"></i> Novo Movimento
                </a>
            </div>

            <!-- Mensagem de sucesso -->
            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <!-- Barra de busca -->
            <form action="{{ route('movimento.index') }}" method="GET" class="mb-6">
                <div class="flex flex-col md:flex-row gap-3">
                    <div class="relative flex-grow">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" name="search" placeholder="Buscar por observação ou local..."
                               value="{{ request('search') }}"
                               class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md transition-colors flex items-center justify-center">
                        <i class="fas fa-search mr-2"></i> Buscar
                    </button>
                    @if(request('search'))
                        <a href="{{ route('movimento.index') }}"
                           class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-md transition-colors flex items-center justify-center">
                            <i class="fas fa-times mr-2"></i> Limpar
                        </a>
                    @endif
                </div>
            </form>

            <!-- Tabela de movimentos -->
            @if ($movimentos->count() > 0)
                <div class="overflow-x-auto shadow rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Observação</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Local</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($movimentos as $mov)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $mov->id }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $mov->observacao ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $mov->local->identifica ?? 'Local não informado' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                            {{ $mov->tipo_movimento == 1 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $mov->tipo_movimento == 1 ? 'Entrada' : 'Saída' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('movimento.show', $mov->id) }}"
                                               class="inline-flex items-center px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white text-xs rounded transition"
                                               title="Visualizar">
                                                <i class="fas fa-eye mr-1"></i> Ver
                                            </a>
                                            <form action="{{ route('movimento.destroy', $mov->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="inline-flex items-center px-2 py-1 bg-red-600 hover:bg-red-700 text-white text-xs rounded transition"
                                                        title="Excluir"
                                                        onclick="return confirm('Tem certeza que deseja excluir este movimento?')">
                                                    <i class="fas fa-trash-alt mr-1"></i> Excluir
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Paginação -->
                <div class="mt-4 flex flex-col md:flex-row items-center justify-between">
                    <div class="text-sm text-gray-500 mb-2 md:mb-0">
                        Mostrando {{ $movimentos->firstItem() }} a {{ $movimentos->lastItem() }} de {{ $movimentos->total() }} movimentos
                    </div>
                    <div class="pagination">
                        {{ $movimentos->appends(request()->query())->links() }}
                    </div>
                </div>
            @else
                <div class="bg-gray-50 p-8 rounded-lg text-center border border-gray-200">
                    <i class="fas fa-exchange-alt text-5xl text-gray-400 mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Nenhum movimento encontrado</h3>
                    <p class="text-gray-500 mb-4">
                        @if(request('search'))
                            Sua busca por "{{ request('search') }}" não retornou resultados.
                        @else
                            Parece que você ainda não cadastrou nenhum movimento.
                        @endif
                    </p>
                    <a href="{{ route('movimento.create') }}"
                       class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-white hover:bg-green-700 transition">
                        <i class="fas fa-plus-circle mr-2"></i> Cadastrar novo movimento
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
