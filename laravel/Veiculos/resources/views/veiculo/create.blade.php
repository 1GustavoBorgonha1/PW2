@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Novo Veiculo</h2>
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

    <form action="{{ route('veiculo.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="modelo" class="block">Modelo do Veículo</label>
            <input type="text" name="modelo" id="modelo" class="w-full border p-2 rounded" required>
            <!-- Corrigido: name="nome" para name="modelo" para bater com a validação -->
        </div>

        <div>
            <label for="descricao" class="block">Descrição:</label>
            <textarea name="descricao" id="descricao" class="w-full border p-2 rounded"></textarea>
        </div>

        <div>
            <label for="placa" class="block">Placa:</label>
            <input type="text" name="placa" id="placa" class="w-full border p-2 rounded" required maxlength="7">
            <!-- Adicionado campo placa -->
        </div>

        <div>
            <label for="kilometragem" class="block">Quilometragem:</label>
            <input type="number" name="kilometragem" id="kilometragem" class="w-full border p-2 rounded" max="9999999">
            <!-- Adicionado campo kilometragem com max de 7 dígitos -->
        </div>

        <div>
            <label for="marca_id" class="block">Marca</label>
            <select name="marca_id" id="marca_id" class="w-full border p-2 rounded" required>
                <option value="">Selecione uma marca</option>
                @foreach ($marcas as $marca)
                    <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Cadastrar</button>
        </div>
    </form>
    </div>
@endsection
