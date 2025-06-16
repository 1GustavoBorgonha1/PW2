@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Editar Veículo</h2>
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

        <form action="{{ route('veiculo.update', $veiculo->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="modelo" class="block">Modelo do Veículo</label>
                <input type="text" name="modelo" id="modelo"
                       value="{{ old('modelo', $veiculo->modelo) }}"
                       class="w-full border p-2 rounded" required>
            </div>

            <div>
                <label for="descricao" class="block">Descrição:</label>
                <textarea name="descricao" id="descricao"
                          class="w-full border p-2 rounded">{{ old('descricao', $veiculo->descricao) }}</textarea>
            </div>

            <div>
                <label for="placa" class="block">Placa:</label>
                <input type="text" name="placa" id="placa"
                       value="{{ old('placa', $veiculo->placa) }}"
                       class="w-full border p-2 rounded" required maxlength="7">
            </div>

            <div>
                <label for="kilometragem" class="block">Quilometragem:</label>
                <input type="number" name="kilometragem" id="kilometragem"
                       value="{{ old('kilometragem', $veiculo->kilometragem) }}"
                       class="w-full border p-2 rounded" max="9999999">
            </div>

            <div>
                <label for="marca_id" class="block">Marca</label>
                <select name="marca_id" id="marca_id" class="w-full border p-2 rounded" required>
                    <option value="">Selecione uma marca</option>
                    @foreach ($marcas as $marca)
                        <option value="{{ $marca->id }}"
                                {{ old('marca_id', $veiculo->marca_id) == $marca->id ? 'selected' : '' }}>
                            {{ $marca->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <br>
            <div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Atualizar</button>
                <a href="{{ route('veiculo.index') }}" class="inline-block bg-gray-300 text-gray-700 px-4 py-2 rounded ml-2">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
