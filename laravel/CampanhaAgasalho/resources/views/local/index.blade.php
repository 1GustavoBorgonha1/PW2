@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Locais de Coleta</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10">
        @if (session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('local.create') }}" class="bg-green-500 text-white px-4 py-2 rounded inline-block">Novo Local de Coleta</a>

            <form action="{{ route('local.index') }}" method="GET" class="flex">
                <input type="text" name="search" placeholder="Buscar local..."
                       value="{{ request('search') }}"
                       class="w-full px-4 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-r-md">
                    Buscar
                </button>
                @if(request('search'))
                    <a href="{{ route('local.index') }}"
                       class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 ml-2 rounded-md">
                        Limpar
                    </a>
                @endif
            </form>
        </div>

        @if (count($locais) > 0)
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-2">ID</th>
                            <th class="border p-2">Identificador</th>
                            <th class="border p-2">Rua</th>
                            <th class="border p-2">Numero</th>
                            <th class="border p-2">Complemento</th>
                            <th class="border p-2">Bairro</th>
                            <th class="border p-2">Ponto de Referência</th>
                            <th class="border p-2">CEP</th>
                            <th class="border p-2">Cidade</th>
                            <th class="border p-2">Estado</th>
                            <th class="border p-2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($locais as $loc)
                            <tr>
                                <td class="border p-2">{{ $loc->id }}</td>
                                <td class="border p-2">{{ $loc->identifica }}</td>
                                <td class="border p-2">{{ $loc->rua }}</td>
                                <td class="border p-2">{{ $loc->numero }}</td>
                                <td class="border p-2">{{ $loc->complemento ?? '-' }}</td>
                                <td class="border p-2">{{ $loc->bairro }}</td>
                                <td class="border p-2">{{ $loc->pontoreferencia ?? '-' }}</td>
                                <td class="border p-2">{{ $loc->cep }}</td>
                                <td class="border p-2">{{ $loc->cidade }}</td>
                                <td class="border p-2">{{ $loc->estado }}</td>
                                <td class="border p-2 flex space-x-2">
                                    <a href="{{ route('local.edit', $loc->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Editar</a>
                                    <form action="{{ route('local.destroy', $loc->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este local?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-white p-4 rounded shadow">
                <p>Nenhum local de coleta cadastrado.</p>
                @if(request('search'))
                    <p class="text-sm text-gray-500 mt-2">Nenhum resultado encontrado para "{{ request('search') }}"</p>
                @endif
            </div>
        @endif
    </div>
@endsection
