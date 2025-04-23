<?php

namespace App\Http\Controllers;

use App\Models\Movimento;
use Illuminate\Http\Request;
use App\Models\Local;

class MovimentoController extends Controller
{
    public function index()
    {
        $movimentos = Movimento::all();
        // dd($movimentos); // Adicione esta linha
        return view('movimento.index', compact('movimentos'));
    }

    public function create()
    {
        $locais = Local::all();
        return view('movimento.create', compact('locais')); // Corrigido: Passa $locais para a view
    }

    public function store(Request $request)
    {
        $request->validate([
            'observacao' => 'string|max:255',
            'local_id' => 'required|exists:locais,id',
            'tipo_movimento' => 'required|numeric',
        ]);

        // dd($request->categoria_id); // Confirmamos que o valor está aqui

        $movimento = Movimento::create([
            'observacao' => $request->observacao,
            'local_id' => $request->local_id,
            'tipo_movimento' => $request->tipo_movimento,
        ]);

        return redirect()->route('movimento.item_create', ['movimento' => $movimento->id])->with('success', 'Movimento cadastrado com sucesso!');
    }

    // public function edit(Movimento $movimento)
    // {
    //      $categorias = Categoria::all();
    //      return view('movimento.edit', compact('movimento', 'categorias'));
    // }

    // public function update(Request $request, Movimento $movimento)
    // {
    //      $request->validate([
    //          'nome' => 'required|string|max:255',
    //          'descricao' => 'required|string|max:255',
    //      ]);

    //      $movimento->update($request->only(['nome','descricao']));

    //      return redirect()->route('movimento.index')->with('success', 'Movimento atualizado com sucesso!');
    // }

    public function destroy(Movimento $movimento)
    {
        $movimento->delete();
        return redirect()->route('movimento.index')->with('success', 'Movimento excluído com sucesso!');
    }
}
