<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Locais de Coleta</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10">
        @if (session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('local.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Novo Local de Coleta</a>

        @if (count($locais) > 0)
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-2">ID</th>
                        <th class="border p-2">Identificador</th>
                        <th class="border p-2">Rua</th>
                        <th class="border p-2">Numero</th>
                        <th class="border p-2">Complemtento</th>
                        <th class="border p-2">Bairro</th>
                        <th class="border p-2">Ponto de Referência</th>
                        <th class="border p-2">CEP</th>
                        <th class="border p-2">Cidade</th>
                        <th class="border p-2">Estado</th>
                        <th class="border p-2">Ações</th> {{-- Nova coluna para as ações --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($locais as $loc)
                        <tr>
                            <td class="border p-2">{{ $loc->id }}</td>
                            <td class="border p-2">{{ $loc->identifica }}</td>
                            <td class="border p-2">{{ $loc->rua }}</td>
                            <td class="border p-2">{{ $loc->numero }}</td>
                            <td class="border p-2">{{ $loc->complemento }}</td>
                            <td class="border p-2">{{ $loc->bairro }}</td>
                            <td class="border p-2">{{ $loc->pontoreferencia }}</td>
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
        @else
            <p>Nenhum local de coleta cadastrado.</p>
        @endif
    </div>
</x-app-layout>
