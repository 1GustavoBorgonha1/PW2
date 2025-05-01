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
    public function store(Request $request, $movimentoId): RedirectResponse
    {
        // Validar os dados do request
        $request->validate([
            'produtos' => 'required|array|min:1',
            'produtos.*' => 'exists:itens,id',
            'quantidades' => 'required|array|min:1',
            'quantidades.*' => 'integer|min:1',
        ]);

        // Remover esta linha - dd($request->all());

        try {
            // Recupera o movimento
            $movimento = Movimento::findOrFail($movimentoId);

            // Percorre os produtos e quantidades
            foreach ($request->produtos as $index => $itemId) {
                // Verifica se a quantidade foi informada
                if (!isset($request->quantidades[$index]) || $request->quantidades[$index] === null) {
                    return redirect()->back()->withErrors(['error' => 'A quantidade para o item ' . $itemId . ' não foi informada.']);
                }

                // Recupera a quantidade para este item
                $quantidade = $request->quantidades[$index];

                // Recupera o item e atualiza o estoque
                $item = Item::findOrFail($itemId);

                // Verifica estoque antes se for saída
                if ($movimento->tipo_movimento == 2 && $item->estoque < $quantidade) {
                    return redirect()->back()->withErrors(['error' => 'Estoque insuficiente para a saída do item ' . $item->nome . '.']);
                }

                // Anexa o item ao movimento com a quantidade
                $movimento->itens()->attach($itemId, ['qtd' => $quantidade]);

                // Atualiza o estoque com base no tipo de movimento
                if ($movimento->tipo_movimento == 1) {
                    $item->estoque += $quantidade;  // Entrada de estoque
                } else {
                    $item->estoque -= $quantidade;  // Saída de estoque
                }

                // Salva o item após a alteração do estoque
                $item->save();
            }

            // Redireciona com mensagem de sucesso
            return redirect()->route('movimento.show', $movimento->id)
                             ->with('success', 'Itens adicionados ao movimento com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Erro ao processar o movimento: ' . $e->getMessage()]);
        }
    }
}
