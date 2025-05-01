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
                <label for="observacao" class="block">Observação</label>
                <input type="text" name="observacao" id="observacao" class="w-full border p-2 rounded"></input>
            </div>

            <div>
                <label for="local_id" class="block">Local</label>
                <select name="local_id" id="local_id" class="w-full border p-2 rounded" required>
                    <option value="">Selecione um local</option>
                    @foreach ($locais as $local)
                        <option value="{{ $local->id }}">{{ $local->identifica }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="tipo_movimento" class="block">Tipo de Movimento</label>
                <select name="tipo_movimento" id="tipo_movimento" class="w-full border p-2 rounded" required>
                    <option value="">Selecione o tipo</option>
                    <option value="1">Entrada</option>
                    <option value="2">Saída</option>
                </select>
            </div>

            <div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Salvar</button>
            </div>
        </form>
    </div>
</x-app-layout>
