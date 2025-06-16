@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Detalhes do Veiculo #{{ $veiculo->id }}</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10">
        <p><strong>Nome:</strong> {{ $veiculo->modelo }}</p>
        <p><strong>Descrição:</strong> {{ $veiculo->descricao }}</p>
        <p><strong>Placa:</strong> {{ $veiculo->placa }}</p>
        <p><strong>Placa:</strong> {{ $veiculo->kilometragem }}</p>
        <p><strong>Categoria:</strong> {{ $veiculo->marca->nome }}</p>
        {{-- <p><strong>Foto:</strong></p>
        <hr class="my-4">
       <div class="mb-4">
        @if($veiculo->foto)
            @php
                $caminhoCompleto = public_path($veiculo->foto);
                $caminhoAsset = asset($veiculo->foto).'?v='.time();
            @endphp

            @if(file_exists($caminhoCompleto))
                <img src="{{ $caminhoAsset }}" class="w-48 h-48 object-contain border rounded">
            @else
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4">
                    <p>Atenção: Arquivo não encontrado no servidor.</p>
                    <p class="text-sm">Caminho esperado: {{ $caminhoCompleto }}</p>
                </div>
            @endif
        @else
            <p class="text-gray-500">Nenhuma imagem cadastrada para este veiculo.</p>
        @endif --}}
        {{-- </div> --}}
        <div class="flex justify-end space-x-3">
            <a href="{{ route('veiculo.index') }}" class="mt-4 inline-block text-blue-600">← Voltar à lista</a>
        </div>
    </div>

@endsection
