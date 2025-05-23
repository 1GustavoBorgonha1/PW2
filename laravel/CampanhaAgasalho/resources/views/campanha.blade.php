@extends('layouts.campanha')

@section('content')
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-semibold text-gray-900 mb-8 text-center mx-auto">Campanha do Agasalho</h1>
            <p class="text-gray-700 mb-4 text-center mx-auto">Ajude quem precisa. Doe com amor.</p>

            <section class="mb-8">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Locais de Entrega</h2>
                @foreach ($locais as $local)
                    <div class="bg-white shadow-sm rounded-lg p-4 mb-4">
                        <h3 class="text-lg font-semibold text-blue-600">{{ $local->identifica }}</h3>
                        <p class="text-gray-700">{{ $local->rua }}, {{ $local->numero }} - {{ $local->bairro }}</p>
                        <p class="text-gray-700">{{ $local->cidade }} - {{ $local->estado }}</p>
                    </div>
                @endforeach
            </section>

            <section class="mb-8">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Itens Mais Movimentados</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($maisMovimentados as $item)
                        <div class="bg-white shadow-sm rounded-lg p-4">
                            <h3 class="text-lg font-semibold text-green-600">{{ $item->nome }}</h3>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
@endsection
