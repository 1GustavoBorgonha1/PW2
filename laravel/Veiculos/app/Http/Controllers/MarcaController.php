<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;



    class MarcaController extends Controller
    {
        public function index(Request $request)
        {
            $search = $request->input('search');

            $marcas = Marca::when($search, function ($query, $search) {
                return $query->where('nome', 'like', "%{$search}%");
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

            return view('marca.index', compact('marcas'));
        }

        public function create()
        {
            return view('marca.create');
        }

        public function store(Request $request)
        {
            $request->validate([
                'nome' => 'required|string|max:255',
                'descricao' => 'nullable|string',
            ]);

            Marca::create($request->only(['nome', 'descricao']));

            return redirect()->route('marca.index')->with('success', 'Marca cadastrada com sucesso!');
        }

        public function edit(Marca $marca)
        {
            return view('marca.edit', compact('marca'));
        }

        public function update(Request $request, Marca $marca)
        {
            $request->validate([
                'nome' => 'required|string|max:255',
                'descricao' => 'nullable|string',
            ]);

            $marca->update($request->only(['nome', 'descricao']));

            return redirect()->route('marca.index')->with('success', 'Marca atualizada com sucesso!');
        }

        public function destroy(Marca $marca)
        {
            $marca->delete();
            return redirect()->route('marca.index')->with('success', 'Marca excluída com sucesso!');
        }
    }
