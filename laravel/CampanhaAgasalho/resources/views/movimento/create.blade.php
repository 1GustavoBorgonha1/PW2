@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Novo Movimento</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-10">
        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('movimento.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block">Observação:</label>
                <input type="text" name="observacao" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block">Local:</label>
                <select name="local_id" class="w-full border rounded px-3 py-2" required>
                    <option value="">Selecione</option>
                    @foreach ($locais as $local)
                        <option value="{{ $local->id }}">{{ $local->identifica }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block">Tipo de Movimento:</label>
                <select name="tipo_movimento" class="w-full border rounded px-3 py-2" required>
                    <option value="1">Entrada</option>
                    <option value="2">Saída</option>
                </select>
            </div>

            <div id="produtos" class="mb-6">
                <label class="block mb-2">Produtos:</label>
                <div class="produto flex space-x-2 mb-2">
                    <select name="produtos[]" class="w-full border rounded px-3 py-2" required>
                        <option value="">Selecione um produto</option>
                        @foreach ($itens as $item)
                            <option value="{{ $item->id }}">{{ $item->nome }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="quantidades[]" class="w-32 border rounded px-3 py-2" min="1" placeholder="Qtd" required>
                    <button type="button" onclick="removerProduto(this)" class="bg-red-500 text-white px-3 rounded">-</button>
                </div>
            </div>

            <button type="button" onclick="adicionarProduto()" class="bg-blue-500 text-white px-4 py-2 rounded mb-4">+ Produto</button>
            <br>

            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded">Salvar Movimento</button>
        </form>
    </div>

    <script>
        function adicionarProduto() {
            const div = document.createElement('div');
            div.classList.add('produto', 'flex', 'space-x-2', 'mb-2');
            div.innerHTML = `
                <select name="produtos[]" class="w-full border rounded px-3 py-2" required>
                    <option value="">Selecione um produto</option>
                    @foreach ($itens as $item)
                        <option value="{{ $item->id }}">{{ $item->nome }}</option>
                    @endforeach
                </select>
                <input type="number" name="quantidades[]" class="w-32 border rounded px-3 py-2" min="1" placeholder="Qtd" required>
                <button type="button" onclick="removerProduto(this)" class="bg-red-500 text-white px-3 rounded">-</button>
            `;
            document.getElementById('produtos').appendChild(div);
        }

        function removerProduto(button) {
            button.parentElement.remove();
        }

        // Verifique os dados antes de enviar
        document.querySelector("form").addEventListener("submit", function(event) {
            const produtos = document.getElementsByName("produtos[]");
            const quantidades = document.getElementsByName("quantidades[]");

            // Exibir os dados no console antes de enviar
            let produtoValues = [];
            let quantidadeValues = [];
            for (let i = 0; i < produtos.length; i++) {
                produtoValues.push(produtos[i].value);
                quantidadeValues.push(quantidades[i].value);
            }

            console.log("Produtos selecionados:", produtoValues);
            console.log("Quantidades selecionadas:", quantidadeValues);

            // Caso a quantidade seja inválida, prevenir o envio do formulário
            if (quantidadeValues.includes("") || produtoValues.includes("")) {
                event.preventDefault();
                alert("Por favor, preencha todos os campos de quantidade e produto.");
            }
        });
    </script>


@endsection
