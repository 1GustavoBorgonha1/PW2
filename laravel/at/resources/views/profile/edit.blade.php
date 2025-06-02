<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

            {{-- Gerenciamento de Tokens --}}
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="font-semibold text-lg mb-4">Gerenciar Tokens de API</h3>

                    {{-- Listar tokens existentes --}}
                    @if (auth()->user()->tokens->count())
                        <ul class="mb-4">
                            @foreach (auth()->user()->tokens as $token)
                                <li class="flex items-center justify-between mb-2">
                                    <span>{{ $token->name }}</span>
                                    <form method="POST" action="{{ route('profile.token.revoke', $token->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline text-sm">Deletar</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="mb-4 text-sm text-gray-500">Nenhum token criado.</p>
                    @endif

                    {{-- Criar novo token --}}
                    <form method="POST" action="{{ route('profile.token.generate') }}">
                        @csrf
                        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Criar Token</button>
                    </form>
                    @if(session('token'))
                        <div class="mt-2 text-green-600">
                            Token criado:
                            <span class="font-mono bg-gray-100 px-2 py-1 rounded select-all">
                                {{ session('token') }}
                            </span>
                            <span class="text-xs text-gray-500 block mt-1">Copie e salve este token agora. Ele não será exibido novamente.</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
