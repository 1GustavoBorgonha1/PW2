<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Categoria;

class ItemController extends Controller
{
    public function index()
    {
        $itens = item::all();
        // dd($itens); // Adicione esta linha
        return view('item.index', compact('itens'));
    }

    public function create()
    {
        $categorias = Categoria::all(); // Busca todas as categorias do banco de dados
        return view('item.create', compact('categorias')); // Passa as categorias para a view
    }

    public function store(Request $request)
{
    $request->validate([
        'nome' => 'required|string|max:255',
        'descricao' => 'nullable|string',
        'categoria_id' => 'required|exists:categorias,id',
    ]);

    // dd($request->categoria_id); // Confirmamos que o valor está aqui

    $item = Item::create([
        'nome' => $request->nome,
        'descricao' => $request->descricao,
        'categoria_id' => $request->categoria_id,
    ]);

    return redirect()->route('item.index')->with('success', 'Item cadastrado com sucesso!');
    }

    public function edit(Item $item)
    {
        $categorias = Categoria::all();
        return view('item.edit', compact('item', 'categorias'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
        ]);

        $item->update($request->only(['nome','descricao']));

        return redirect()->route('item.index')->with('success', 'Item atualizado com sucesso!');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('item.index')->with('success', 'Item excluído com sucesso!');
    }
}
