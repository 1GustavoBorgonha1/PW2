@extends('layouts.app')

@section('content')
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

        <form action="{{ route('itemmovimento.store') }}" method="POST" class="space-y-4">
            @csrf
            <caption>Adicionar Produtos</caption>
            <tr class="bg-gray-100">
                <th class="border p-2">ID</th>
                <th class="border p-2">Itens</th>
                <th class="border p-2">Quantidade</th>
                <th class="border p-2">Ações</th> {{-- Nova coluna para as ações --}}
            </tr>
            <tr>
                <td class="border p-2">
                    <input type="text" name="id" id="id" class="w-full border p-2 rounded" required>
                </td>
                <td class="border p-2">
                    <input type="text" name="produto" id="produto" class="w-full border p-2 rounded" required>
                </td class="border p-2">
                <td>
                    <label for="item_id" class="block">Item</label>
                    <select name="item_id" id="item_id" class="w-full border p-2 rounded" required>
                        <option value="">Selecione um item</option>
                            @foreach ($itens as $item)
                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                            @endforeach
                    </select>
                </td>
                <td class="border p-2"></td>
            </tr>
            <div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded" onclick="addproduto()">Adicionar</button>
            </div>
        </form>
        <table>
            <caption>Produtos</caption>
            <thead>
                <tr class="bg-gray-100">
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Itens</th>
                    <th class="border p-2">Quantidade</th>
                    <th class="border p-2">Ações</th> {{-- Nova coluna para as ações --}}
                </tr>
            </thead>
        </table>
    </div>
@endsection
