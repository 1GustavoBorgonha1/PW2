<?php

namespace App\Http\Controllers;

use App\Models\TipoContato;
use Illuminate\Http\Request;

class TipoContatoController extends Controller
{
    public function index()
    {
        $tipocontato = TipoContato::all();
        return view('tipocontato.index', compact('tipocontato'));
    }

    public function create()
    {
        return view('tipocontato.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        TipoContato::create($request->only(['nome', 'descricao']));

        return redirect()->route('tipocontato.index')->with('success', 'Tipo de contato cadastrado com sucesso!');
    }

    public function edit(TipoContato $tipocontato)
    {
        return view('tipocontato.edit', compact('tipocontato'));
    }

    public function update(Request $request, TipoContato $tipocontato)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        $tipocontato->update($request->only(['nome', 'descricao']));

        return redirect()->route('tipocontato.index')->with('success', 'Tipo de contato atualizado com sucesso!');
    }

    public function destroy(TipoContato $tipocontato)
    {
        $tipocontato->delete();
        return redirect()->route('tipocontato.index')->with('success', 'Tipo de contato excluído com sucesso!');
    }
}
