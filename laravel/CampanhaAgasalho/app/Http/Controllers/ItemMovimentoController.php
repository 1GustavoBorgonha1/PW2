<?php

namespace App\Http\Controllers;

use App\Models\Movimento;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ItemMovimentoController extends Controller
{
    /**
     * Exibe a tela para adicionar itens a um movimento específico.
     *
     * @param int $movimentoId
     * @return \Illuminate\View\View
     */
    public function create($movimento_id): View
    {
        try {
            $movimento = Movimento::findOrFail($movimento_id); // Garante que o movimento existe
        } catch (ModelNotFoundException $e) {
            // Se o movimento não existe, redireciona com erro.
            return view('errors.generic', ['message' => 'Movimento não encontrado.']);
        }
        $itens = Item::all();
        return view('movimento.item_create', compact('itens', 'movimento_id'));
    }

    /**
     * Adiciona um item a um movimento existente.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'movimento_id' => 'required|exists:movimentos,id',
            'item_id' => 'required|exists:itens,id',
            'qtd' => 'required|integer|min:1',
        ]);

        $movimento = Movimento::findOrFail($request->movimento_id);
        $item = Item::findOrFail($request->item_id);

        // Verifica se o item já existe no movimento
        if ($movimento->itens()->where('item_id', $request->item_id)->exists()) {
            return redirect()->back()->withErrors(['error' => 'Item já adicionado a este movimento.']);
        }

        $movimento->itens()->attach($request->item_id, ['qtd' => $request->qtd]);

        // Atualiza o estoque
        if ($movimento->tipo_movimento == 1) { // 1 para entrada
            $item->estoque += $request->qtd;
        } else {
            $item->estoque -= $request->qtd;
            if ($item->estoque < 0) {
                $movimento->itens()->detach($request->item_id);
                return redirect()->back()->withErrors(['error' => 'Estoque insuficiente para realizar a saída do item.']);
            }
        }
        $item->save();

        return redirect()->route('movimento.index')->with('success', 'Item adicionado ao movimento!');
    }
}
