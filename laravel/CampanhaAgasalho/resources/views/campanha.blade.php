@extends('layouts.campanha')

@section('content')
    <div class="py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Campanha do Agasalho</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Ajude quem precisa neste inverno. Sua doação faz a diferença!</p>
        </div>

        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="p-6 bg-gradient-to-r from-blue-600 to-blue-800">
                    <h2 class="text-2xl font-bold text-white">Locais de Entrega</h2>
                    <p class="text-blue-100">Encontre o ponto de coleta mais próximo de você</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
                    @foreach ($locais as $local)
                        <div class="border border-gray-200 rounded-lg hover:shadow-md transition-all duration-300">
                            <div class="p-5">
                                <div class="flex items-center mb-3">
                                    <div class="bg-blue-100 p-2 rounded-full mr-3">
                                        <i class="fas fa-map-marker-alt text-blue-600"></i>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $local->identifica }}</h3>
                                </div>
                                <p class="text-gray-600 mb-2"><i class="fas fa-road mr-2 text-gray-400"></i>{{ $local->rua }}, {{ $local->numero }}</p>
                                <p class="text-gray-600 mb-4"><i class="fas fa-map-pin mr-2 text-gray-400"></i>{{ $local->bairro }} - {{ $local->cidade }}/{{ $local->estado }}</p>

                                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($local->rua.' '.$local->numero.', '.$local->bairro.', '.$local->cidade.', '.$local->estado) }}"
                                   target="_blank"
                                   class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                    <i class="fas fa-map-marked-alt mr-2"></i> Ver no Mapa
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
            <div class="text-center mb-10">
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Itens Mais Doados</h2>
                <div class="w-20 h-1 bg-blue-600 mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($maisDoados as $item)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-transform duration-300 hover:-translate-y-1">
                        <div class="relative h-48 bg-gray-100">
                            @if($item->foto && file_exists(public_path($item->foto)))
                                <img src="{{ asset($item->foto) }}"
                                     alt="{{ $item->nome }}"
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    <i class="fas fa-tshirt text-5xl"></i>
                                </div>
                            @endif
                            <div class="absolute top-2 right-2 bg-blue-600 text-white text-xs font-bold px-2 py-1 rounded">
                                {{ $item->quantidade_saida }} doados
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-lg text-gray-800 mb-1">{{ $item->nome }}</h3>
                            <div class="flex items-center text-yellow-400 mb-2">
                                <i class="fas fa-heart"></i>
                                <span class="text-xs text-gray-500 ml-1">Item essencial</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        @if($semEstoque->count() > 0)
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
                <div class="text-center mb-10">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Itens em Falta</h2>
                    <p class="text-gray-600">Estes itens estão precisando urgentemente de doações</p>
                    <div class="w-20 h-1 bg-red-500 mx-auto"></div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($semEstoque as $item)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden border-l-4 border-red-500 hover:shadow-lg">
                            <div class="relative h-48 bg-gray-100">
                                @if($item->foto && file_exists(public_path($item->foto)))
                                    <img src="{{ asset($item->foto) }}"
                                         alt="{{ $item->nome }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">
                                        <i class="fas fa-tshirt text-5xl"></i>
                                    </div>
                                @endif
                                <div class="absolute top-2 right-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">
                                    Urgente!
                                </div>
                            </div>
                            <div class="p-4">
                                <h3 class="font-semibold text-lg text-gray-800 mb-1">{{ $item->nome }}</h3>
                                <div class="flex items-center text-red-500">
                                    <i class="fas fa-exclamation-circle mr-1"></i>
                                    <span class="text-sm">Estoque esgotado</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
    </div>
@endsection
