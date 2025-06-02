<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo Contato') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if ($errors->any())
                    <div id="error-message" class="error-message alert alert-danger items-center bg-red-500 text-white font-bold py-2 px-4 rounded mb-4">                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <script>
                        setTimeout(() => {
                            const errorMessage = document.getElementById('error-message');
                            if (errorMessage) {
                                errorMessage.style.display = 'none';
                            }
                        }, 5000);
                    </script>
                @endif
                <div class="p-6 text-gray-900">
                    <form action="{{ route('contatos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Tipo contato:</label>
                            <select name="tipo_contato_id" id="tipo_contato_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="">Selecione</option>
                                @foreach ($tipocontatos as $tipocontato)
                                    <option value="{{ $tipocontato->id }}">{{ $tipocontato->nome }} - {{ $tipocontato->descricao }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nome:</label>
                            <input type="text" name="nome" id="nome" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                            <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>

                        <div class="mb-4">
                            <label for="telefone" class="block text-gray-700 text-sm font-bold mb-2">Telefone:</label>
                            <input type="text" name="telefone" id="telefone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label for="cidade" class="block text-gray-700 text-sm font-bold mb-2">Cidade:</label>
                            <input type="text" name="cidade" id="cidade" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label for="estado" class="block text-gray-700 text-sm font-bold mb-2">Estado:</label>
                            <input type="text" name="estado" id="estado" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <label for="foto" class="block text-gray-700 text-sm font-bold mb-2">Foto:</label>
                            <input type="file" name="foto" id="foto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Salvar</button>
                    </form>
                </div>
                <x-voltar>Voltar</x-voltar>
            </div>
        </div>
    </div>
</x-app-layout>

