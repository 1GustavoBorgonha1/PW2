<?php

namespace App\Http\Controllers;

use App\Models\Movimento;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ItemMovimentoController extends Controller
{

    public function store(Request $request, $movimentoId): RedirectResponse
    {
        $request->validate([
            'produtos' => 'required|array|min:1',
            'produtos.*' => 'exists:itens,id',
            'quantidades' => 'required|array|min:1',
            'quantidades.*' => 'integer|min:1',
        ]);

        try {
            $movimento = Movimento::findOrFail($movimentoId);


            foreach ($request->produtos as $index => $itemId) {
                if (!isset($request->quantidades[$index]) || $request->quantidades[$index] === null) {
                    return redirect()->back()->withErrors(['error' => 'A quantidade para o item ' . $itemId . ' não foi informada.']);
                }

                $quantidade = $request->quantidades[$index];

                $item = Item::findOrFail($itemId);

                if ($movimento->tipo_movimento == 2 && $item->estoque < $quantidade) {
                    return redirect()->back()->withErrors(['error' => 'Estoque insuficiente para a saída do item ' . $item->nome . '.']);
                }

                $movimento->itens()->attach($itemId, ['qtd' => $quantidade]);

                if ($movimento->tipo_movimento == 1) {
                    $item->estoque += $quantidade;
                } else {
                    $item->estoque -= $quantidade;
                }

                $item->save();
            }

            return redirect()->route('movimento.show', $movimento->id)
                             ->with('success', 'Itens adicionados ao movimento com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Erro ao processar o movimento: ' . $e->getMessage()]);
        }
    }
}
