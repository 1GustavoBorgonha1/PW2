@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <!-- Cabeçalho -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Locais de Coleta</h2>
                <a href="{{ route('local.create') }}"
                   class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md flex items-center gap-2 transition">
                    <i class="fas fa-plus"></i> Novo Local
                </a>
            </div>

            @if (session('success'))
                <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        {{ session('success') }}
                    </div>
                </div>
            @endif

            <!-- Barra de busca -->
            <form action="{{ route('local.index') }}" method="GET" class="mb-6">
                <div class="flex flex-col md:flex-row gap-3">
                    <div class="relative flex-grow">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" name="search" placeholder="Buscar por identificador, rua ou bairro..."
                               value="{{ request('search') }}"
                               class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md transition-colors flex items-center justify-center">
                        <i class="fas fa-search mr-2"></i> Buscar
                    </button>
                    @if(request('search'))
                        <a href="{{ route('local.index') }}"
                           class="px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white rounded-md transition-colors flex items-center justify-center">
                            <i class="fas fa-times mr-2"></i> Limpar
                        </a>
                    @endif
                </div>
            </form>

            @if ($locais->count() > 0)
                <div class="overflow-x-auto shadow rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Identificador</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Endereço</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Bairro</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cidade/Estado</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($locais as $loc)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $loc->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loc->identifica }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{ $loc->rua }}, {{ $loc->numero }}<br>
                                        @if($loc->complemento)
                                            <span class="text-gray-400">{{ $loc->complemento }}</span><br>
                                        @endif
                                        CEP: {{ $loc->cep }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $loc->bairro }}<br>
                                        @if($loc->pontoreferencia)
                                            <span class="text-xs text-gray-400">Ref: {{ $loc->pontoreferencia }}</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $loc->cidade }}/{{ $loc->estado }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('local.edit', $loc->id) }}"
                                               class="inline-flex items-center px-2 py-1 bg-yellow-500 hover:bg-yellow-600 text-white text-xs rounded transition"
                                               title="Editar">
                                                <i class="fas fa-edit mr-1"></i> Editar
                                            </a>
                                            <form action="{{ route('local.destroy', $loc->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="inline-flex items-center px-2 py-1 bg-red-600 hover:bg-red-700 text-white text-xs rounded transition"
                                                        title="Excluir"
                                                        onclick="return confirm('Tem certeza que deseja excluir este local?')">
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

                <div class="mt-4 flex flex-col md:flex-row items-center justify-between">
                    <div class="text-sm text-gray-500 mb-2 md:mb-0">
                        Mostrando {{ $locais->firstItem() }} a {{ $locais->lastItem() }} de {{ $locais->total() }} locais
                    </div>
                    <div class="pagination">
                        {{ $locais->appends(request()->query())->links() }}
                    </div>
                </div>
            @else
                <div class="bg-gray-50 p-8 rounded-lg text-center border border-gray-200">
                    <i class="fas fa-map-marker-alt text-5xl text-gray-400 mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Nenhum local encontrado</h3>
                    <p class="text-gray-500 mb-4">
                        @if(request('search'))
                            Sua busca por "{{ request('search') }}" não retornou resultados.
                        @else
                            Parece que você ainda não cadastrou nenhum local de coleta.
                        @endif
                    </p>
                    <a href="{{ route('local.create') }}"
                       class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-white hover:bg-green-700 transition">
                        <i class="fas fa-plus-circle mr-2"></i> Cadastrar novo local
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
