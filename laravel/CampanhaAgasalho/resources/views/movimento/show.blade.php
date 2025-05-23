@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Detalhes do Movimento #{{ $movimento->id }}</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10">
        <p><strong>Observação:</strong> {{ $movimento->observacao }}</p>
        <p><strong>Local:</strong> {{ $movimento->local->identifica }}</p>
        <p><strong>Tipo:</strong> {{ $movimento->tipo_movimento == 1 ? 'Entrada' : 'Saída' }}</p>
        <hr class="my-4">

        <h3 class="font-semibold text-lg mb-2">Itens do Movimento:</h3>
        @if ($movimento->itens->count())
            <ul class="list-disc pl-6">
                @foreach ($movimento->itens as $item)
                    <li>{{ $item->nome }} — Quantidade: {{ $item->pivot->qtd }}</li>
                @endforeach
            </ul>
        @else
            <p>Nenhum item associado a este movimento.</p>
        @endif

        <a href="{{ route('movimento.index') }}" class="mt-4 inline-block text-blue-600">← Voltar à lista</a>
    </div>
@endsection
