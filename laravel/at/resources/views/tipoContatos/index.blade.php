<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tipo Contatos') }}
        </h2>
        <br>
        <div class="mb-4">
            <a href="{{ route('tipocontatos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Novo Tipo de Contato
            </a>
        </div>

    </x-slot>
    <script type="text/javascript">
        function exibe(id) {
            var descricao = document.getElementById(id);
            if (descricao.style.display === "none") {
                descricao.style.display = "block";
            } else {
                descricao.style.display = "none";
            }
        }
    </script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div id="success-message" class="alert alert-success items-center bg-green-500 text-white font-bold py-2 px-4 rounded mb-4">
                            {{ session('success') }}
                        </div>
                        <script>
                            setTimeout(() => {
                                const successMessage = document.getElementById('success-message');
                                if (successMessage) {
                                    successMessage.style.display = 'none';
                                }
                            }, 5000);
                        </script>
                    @endif
                    @foreach ($tipocontatos as $tipocontato)
                        <div class="mb-4">
                            <strong onclick="exibe('descricao-{{ $tipocontato->id }}')" class="cursor-pointer" title="Mostrar detalhes">{{ $tipocontato->nome }}</strong>
                            &nbsp;-&nbsp;
                            <a href="{{ url("tipocontatos") }}/{{ $tipocontato->id }}/edit" class="bg-green-700 hover:bg-green-900 text-white font-bold py-1 px-2 rounded">Alterar</a>
                            &nbsp;-&nbsp;
                            <span class="bg-red-700 hover:bg-red-900 text-white font-bold py-1 px-2 rounded cursor-pointer"
                            onclick="if(confirm('Tem certeza que deseja excluir este Tipo Contato?')) document.getElementById('form-tipocontatos-excluir-{{$tipocontato->id}}').submit()">Excluir</span>
                            <form id="form-tipocontatos-excluir-{{$tipocontato->id}}" action="{{route('tipocontatos.destroy',$tipocontato->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                            <div id="descricao-{{ $tipocontato->id }}" class="mt-2 text-gray-600 descricao" style="display: none;">
                                {{ $tipocontato->descricao }}:
                                <!--
                                    Exibe os contatos relacionados a este tipo de contato
                                    Se não houver nenhum contato cadastrado para este tipo de contato, exibe mensagem informativa
                                -->
                                <ul>
                                @if ($tipocontato->contatos->isEmpty())
                                    <li>
                                        <strong>Não há contatos cadastrados para este tipo de contato.</strong>
                                        <br><br>
                                        <a href="{{ route('contatos.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Novo Contato
                                        </a>
                                    </li>
                                @else
                                    @foreach ($tipocontato->contatos as $contato)
                                        <li>
                                            <a href="{{ route('contatos.show', $contato->id) }}" class="hover:bg-blue-900 hover:white hover:text-white rounded-md px-2 py-1"><strong>Contato:</strong> {{ $contato->nome }} - {{ $contato->email }} - {{ $contato->telefone }}</a>
                                        </li>
                                    @endforeach
                                @endif
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
