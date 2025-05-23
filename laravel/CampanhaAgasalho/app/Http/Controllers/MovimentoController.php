<?php

namespace App\Http\Controllers;

use App\Models\Movimento;
use App\Models\ItemMovimento;
use App\Models\Local;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MovimentoController extends Controller
{
    /**
     * Exibe a lista de todos os movimentos.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $movimentos = Movimento::with('local')->get();
        return view('movimento.index', compact('movimentos'));
    }

    /**
     * Exibe o formulário para criar um novo movimento.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $locais = Local::all();
        $itens = Item::all();
        return view('movimento.create', compact('locais', 'itens'));
    }

    /**
     * Armazena um novo movimento no banco de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'observacao' => 'required|string',
            'local_id' => 'required|exists:locais,id',
            'tipo_movimento' => 'required|in:1,2',
            'produtos' => 'required|array|min:1',
            'produtos.*' => 'required|exists:itens,id',
            'quantidades' => 'required|array|min:1',
            'quantidades.*' => 'required|integer|min:1',
        ]);

        // Usar transação para garantir integridade dos dados
        DB::beginTransaction();

        try {
            $movimento = Movimento::create([
                'observacao' => $request->observacao,
                'local_id' => $request->local_id,
                'tipo_movimento' => $request->tipo_movimento,
                // Adicionar user_id se necessário
                // 'user_id' => auth()->id(),
            ]);

            foreach ($request->produtos as $index => $produtoId) {
                $quantidade = $request->quantidades[$index];
                $item = Item::findOrFail($produtoId);

                // Verifica estoque no caso de saída
                if ($movimento->tipo_movimento == 2 && $item->estoque < $quantidade) {
                    DB::rollBack();
                    return redirect()->back()
                        ->withInput()
                        ->withErrors(['error' => 'Estoque insuficiente para o item: ' . $item->nome]);
                }

                // Cria o registro na tabela itens_movimento
                ItemMovimento::create([
                    'movimento_id' => $movimento->id,
                    'item_id' => $produtoId,
                    'qtd' => $quantidade, // Usando o nome correto da coluna
                ]);

                // Atualiza o estoque
                if ($movimento->tipo_movimento == 1) {
                    $item->estoque += $quantidade;
                } else {
                    $item->estoque -= $quantidade;
                }

                $item->save();
            }

            DB::commit();
            return redirect()->route('movimento.index')
                ->with('success', 'Movimento salvo com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Erro ao salvar o movimento: ' . $e->getMessage()]);
        }
    }

    /**
     * Exibe os detalhes de um movimento específico.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $movimento = Movimento::with('local', 'itens')->findOrFail($id);

        return view('movimento.show', compact('movimento'));
    }


    /**
     * Remove o movimento especificado e estorna o estoque.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Movimento $movimento)
    {
        // Inicia a transação para garantir a integridade do banco de dados
        DB::beginTransaction();

        try {
            // Carrega os itens relacionados ao movimento
            $movimento->load('itens');

            // Itera sobre os itens do movimento para desfazer as alterações no estoque
            foreach ($movimento->itens as $item) {
                $quantidade = $item->pivot->qtd; // Obtém a quantidade da tabela pivot

                // Desfaz a alteração no estoque com base no tipo do movimento original
                if ($movimento->tipo_movimento == 1) { // Se foi uma entrada, diminui o estoque
                    $item->estoque -= $quantidade;
                } else { // Se foi uma saída, aumenta o estoque
                    $item->estoque += $quantidade;
                }

                // Salva a alteração no estoque do item
                $item->save();
            }

            // Agora que o estoque foi estornado, podemos excluir o movimento
            $movimento->delete();

            // Confirma a transação
            DB::commit();

            return redirect()->route('movimento.index')->with('success', 'Movimento excluído e estoque estornado com sucesso!');

        } catch (\Exception $e) {
            // Em caso de erro, desfaz a transação
            DB::rollBack();
            return redirect()->route('movimento.index')->with('error', 'Erro ao excluir movimento e estornar estoque: ' . $e->getMessage());
        }

    }

}
