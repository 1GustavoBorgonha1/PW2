@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto py-10">

        {{-- Cabeçalho da página --}}
        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">
                Nova Marca
            </h2>
        </div>

        {{-- Exibição de erros de validação --}}
        @if ($errors->any())
            <div class="mb-4 text-red-600 bg-red-100 border border-red-300 p-4 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulário --}}
        <form action="{{ route('marca.store') }}" method="POST" class="space-y-6 bg-white p-6 rounded shadow">
            @csrf

            <div>
                <label for="nome" class="block font-medium text-gray-700">Nome da marca</label>
                <input
                    type="text"
                    name="nome"
                    id="nome"
                    class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring focus:border-blue-400"
                    required
                    value="{{ old('nome') }}"
                >
            </div>

            <div>
                <label for="descricao" class="block font-medium text-gray-700">Descrição da Marca (Opcional)</label>
                <textarea
                    name="descricao"
                    id="descricao"
                    class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring focus:border-blue-400"
                >{{ old('descricao') }}</textarea>
            </div>

            <div>
                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded transition"
                >
                    Salvar
                </button>
            </div>
        </form>
    </div>
@endsection
