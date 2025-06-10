<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $locais = Local::when($search, function ($query, $search) {
            return $query->whereRaw('LOWER(identifica) LIKE ?', ['%'.strtolower($search).'%']);
        })
        ->orderBy('id', 'desc')
        ->paginate(10);

        return view('local.index', compact('locais'));
    }

    public function create()
    {
        return view('local.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'identifica' => 'required|string|max:255',
            'rua' => 'required|string|max:255',
            'numero' => 'required|integer',
            'bairro' => 'required|string|max:255',
            'cep' => 'required|string|max:10',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
            'complemento' => 'nullable|string|max:255',
            'pontoreferencia' => 'nullable|string|max:255',
        ]);

        Local::create($request->only(['identifica', 'rua', 'numero', 'bairro', 'cep', 'cidade', 'estado', 'complemento', 'pontoreferencia']));

        return redirect()->route('local.index')->with('success', 'Local cadastrado com sucesso!');
    }

    public function edit(Local $local)
    {
        return view('local.edit', compact('local'));
    }

    public function update(Request $request, Local $local)
    {
        $request->validate([
            'identifica' => 'required|string|max:255',
            'rua' => 'required|string|max:255',
            'numero' => 'required|integer',
            'bairro' => 'required|string|max:255',
            'cep' => 'required|string|max:10',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
            'complemento' => 'nullable|string|max:255',
            'pontoreferencia' => 'nullable|string|max:255',
        ]);

        $local->update($request->only(['identifica', 'rua', 'numero', 'bairro', 'cep', 'cidade', 'estado', 'complemento', 'pontoreferencia']));

        return redirect()->route('local.index')->with('success', 'Local atualizado com sucesso!');
    }

    public function destroy(Local $local)
    {
        if ($local->movimentos()->exists()) {
            return redirect()->back()
                ->with('error', 'Não foi possível excluir: existem movimentos vinculados a este local!');
        }

        $local->delete();
        return redirect()->route('local.index')
            ->with('success', 'Local excluído com sucesso!');
    }
}
