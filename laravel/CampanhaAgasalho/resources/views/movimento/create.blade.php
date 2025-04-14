<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Novo Movimento</h2>
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

        <form action="{{ route('movimento.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nome" class="block">Nome do Movimento</label>
                <input type="text" name="nome" id="nome" class="w-full border p-2 rounded" required>
            </div>

            <div>
                <label for="descricao" class="block">Descrição:</label>
                <textarea name="descricao" id="descricao" class="w-full border p-2 rounded"></textarea>
            </div>

            <div>
                <label for="categoria_id" class="block">Categoria</label>
                <select name="categoria_id" id="categoria_id" class="w-full border p-2 rounded" required>
                    <option value="">Selecione uma categoria</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                    @endforeach
                </select>
            </div>
            <br>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Salvar</button>
            </div>
        </form>
    </div>
</x-app-layout>
