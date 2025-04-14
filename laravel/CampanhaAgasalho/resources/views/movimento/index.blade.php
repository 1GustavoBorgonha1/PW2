<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Itens</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10">
        @if (session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('item.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-bitek">Novos Item</a>
        <br>
        <br>
        @if (count($itens) > 0)
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-2">ID</th>
                        <th class="border p-2">Nome</th>
                        <th class="border p-2">Descrição</th>
                        <th class="border p-2">Categoria</th>
                        <th class="border p-2">Estoque</th>
                        <th class="border p-2">Ações</th> {{-- Nova coluna para as ações --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($itens as $ite)
                        <tr>
                            <td class="border p-2">{{ $ite->id }}</td>
                            <td class="border p-2">{{ $ite->nome }}</td>
                            <td class="border p-2">{{ $ite->descricao }}</td>
                            <td class="border p-2">{{ $ite->categoria->nome }}</td> {{-- Acessando o nome da categoria --}}
                            <td class="border p-2">{{ $ite->estoque }}</td>
                            <td class="border p-2 flex space-x-2">
                                <a href="{{ route('item.edit', $ite->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Editar</a>
                                <form action="{{ route('item.destroy', $ite->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este item?')">
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
            <p>Nenhum item cadastrado.</p>
        @endif
    </div>
</x-app-layout>
