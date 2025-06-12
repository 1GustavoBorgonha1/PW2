<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;
use App\Models\Marca;

class VeiculoController extends Controller
{
    public function index()
    {
        $veiculos = veiculo::all();
        return view('veiculo.index', compact('veiculos'));
    }

    public function create()
    {
        $marca = Marca::all();
        return view('veiculo.create', compact('marcas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'modelo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'placa' => 'required|string|max:7',
            'kilometragem' => 'nullable|integer|max:7',
            'marca_id' => 'required|exists:marcas,id',
        ]);


        $veiculo = Veiculo::create([
            'modelo' => $request->modelo,
            'descricao' => $request->descricao,
            'placa' => $request->placa,
            'kilometragem' => $request->kilometragem,
            'marca_id' => $request->marca_id,
        ]);

        return redirect()->route('veiculo.index')->with('success', 'Veiculo cadastrado com sucesso!');
    }

    public function edit(Veiculo $veiculo)
    {
        $marcas = Marca::all();
        return view('veiculo.edit', compact('veiculo', 'marcas'));
    }

    public function update(Request $request, Veiculo $veiculo)
    {
        $request->validate([
            'modelo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'placa' => 'required|string|max:7',
            'kilometragem' => 'nullable|integer|max:7',
            'marca_id' => 'required|exists:marcas,id',
        ]);

        $veiculo->update($request->only(['modelo','descricao', 'placa', 'kilometragem', 'marca_id']));

        return redirect()->route('veiculo.index')->with('success', 'Veiculo atualizado com sucesso!');
    }

    public function destroy(Veiculo $veiculo)
    {
        $veiculo->delete();
        return redirect()->route('veiculo.index')->with('success', 'Veiculo excluído com sucesso!');
    }
}
