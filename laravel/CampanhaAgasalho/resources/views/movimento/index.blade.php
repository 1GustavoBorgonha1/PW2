<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Movimentos</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10">
        @if (session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('movimento.create') }}" class="bg-green-500 text-whmov px-4 py-2 rounded mb-4 inline-bmovk">Novo Movimento</a>
        <br>
        <br>
        @if (count($movimentos) > 0)
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-2">ID</th>
                        <th class="border p-2">Observação</th>
                        <th class="border p-2">Local</th>
                        <th class="border p-2">Tipo de Movimento</th>
                        <th class="border p-2">Ações</th> {{-- Nova coluna para as ações --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($movimentos as $mov)
                        <tr>
                            <td class="border p-2">{{ $mov->id }}</td>
                            <td class="border p-2">{{ $mov->observacao }}</td>
                            <td class="border p-2">{{ $mov->local->identifica }}</td>
                            <td class="border p-2">
                                @if ($mov->tipo == 1)
                                    Entrada
                                @else
                                    Saída
                                @endif
                            </td>
                            <td class="border p-2 flex space-x-2">
                                <a href="{{ route('movimento.item_create', $mov->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded"> + Itens</a>
                                <form action="{{ route('movimento.destroy', $mov->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este movimento?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-whmov px-3 py-1 rounded">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Nenhum movimento cadastrado.</p>
        @endif
    </div>
</x-app-layout>
