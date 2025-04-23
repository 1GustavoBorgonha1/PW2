<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Itens no Movimento</h2>
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

        <form action="{{ route('itens_movimento.store') }}" method="POST" class="space-y-4">
            @csrf

            <input type="hidden" name="movimento_id" value="{{ $movimento_id }}">
            <div>
                <label for="item_id" class="block">Item</label>
                <select name="item_id" id="item_id" class="w-full border p-2 rounded" required>
                    <option value="">Selecione um item</option>
                    @foreach ($itens as $item)
                        <option value="{{ $item->id }}">{{ $item->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="qtd" class="block">Quantidade</label>
                <input type="number" name="qtd" id="qtd" class="w-full border p-2 rounded" required>
            </div>

            <div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Salvar</button>
            </div>
        </form>
    </div>
</x-app-layout>
