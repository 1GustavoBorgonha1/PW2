<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contato') }} ::
            {{ $contato->id }} - {{ $contato->nome }}
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-4">
                        @if ( file_exists(public_path('fotos').DIRECTORY_SEPARATOR.$contato->foto) and ($contato->foto != "") )
                           <img src="{{ asset('fotos').DIRECTORY_SEPARATOR.$contato->foto }}" class="w-80">
                           <small>{{ $contato->foto }}</small>
                        @endif
                    </div>
                    <div class="mb-4">
                        <ul>
                            <li><strong>Id:</strong>{{ $contato->id }}</li>
                            <li><strong>Tipo contato:</strong>{{ $contato->tipoContato ? $contato->tipoContato->nome.' - '.$contato->tipoContato->descricao : 'N/A' }}</li>
                            <li><strong>Nome:</strong>{{ $contato->nome }}</li>
                            <li><strong>e-mail:</strong><a href="mailto:{{ $contato->email }}" class="hover:underline to-blue-950">{{ $contato->email }}</a></li>
                            <li><strong>Telefone:</strong>{{ $contato->telefone }}</li>
                            <li><strong>Cidade:</strong>{{ $contato->cidade }}</li>
                            <li><strong>Estado:</strong>{{ $contato->estado }}</li>
                            <li><strong>Data de criação:</strong>{{ $contato->created_at }}</li>
                            <li><strong>Data de atualização:</strong>{{ $contato->updated_at }}</li>
                        </ul>
                    </div>
                    <x-voltar>Voltar</x-voltar>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
