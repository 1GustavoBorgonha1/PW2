@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Novo Local de Coleta</h2>
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

        <form action="{{ route('local.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="form-group">
                <label for="identifica">Identificação do Local</label>
                <input type="text" name="identifica" id="identifica" class="form-control" required>
            </div>

            <div>
                <label for="rua" class="block">Rua</label>
                <textarea name="rua" id="rua" class="w-full border p-2 rounded"></textarea>
            </div>

            <div>
                <label for="numero" class="block">Numero</label>
                <input name="numero" id="numero" class="w-full border p-2 rounded"></input>
            </div>

            <div>
                <label for="complemento" class="block">Complemento</label>
                <textarea name="complemento" id="complemento" class="w-full border p-2 rounded"></textarea>
            </div>

            <div>
                <label for="bairro" class="block">Bairro</label>
                <textarea name="bairro" id="bairro" class="w-full border p-2 rounded"></textarea>
            <div>

            <div>
                <label for="pontoreferencia" class="block">Ponto de Referência</label>
                <textarea name="pontoreferencia" id="pontoreferencia" class="w-full border p-2 rounded"></textarea>
            <div>

            <div>
                <label for="cep" class="block">CEP</label>
                <input type="text" name="cep" id="cep" class="w-full border p-2 rounded">
            </div>

            <div>
                <label for="cidade" class="block">Cidade</label>
                <input type="text" name="cidade" id="cidade" class="w-full border p-2 rounded">
            </div>

            <div>
                <label for="estado" class="block">Estado</label>
                <input type="text" name="estado" id="estado" class="w-full border p-2 rounded">
            </div>
            <br>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Salvar</button>
            </div>
        </form>
    </div>
@endsection
