@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900 font-semibold text-xl">
                    {{ __("Menu") }}
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('marca.index') }}" class="text-blue-600 hover:underline">
                        Marcas
                    </a>
                </div>
            </div>

            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('item.index') }}" class="text-blue-600 hover:underline">
                        Veiculos
                    </a>
                </div>
            </div> --}}

        </div>
    </div>
@endsection
