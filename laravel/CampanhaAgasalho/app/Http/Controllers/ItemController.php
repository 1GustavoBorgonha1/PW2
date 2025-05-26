<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Categoria;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $itens = Item::when($search, function ($query, $search) {
            return $query->whereRaw('LOWER(nome) LIKE ?', ['%'.strtolower($search).'%']);
        })->paginate(10);
        return view('item.index', compact('itens'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('item.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id',
            'imagem' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            $pastaDestino = public_path('images');

            if (!file_exists($pastaDestino)) {
                mkdir($pastaDestino, 0755, true);
            }

            $nomeArquivo = 'item_'.time().'.'.$request->imagem->extension();
            $request->imagem->move($pastaDestino, $nomeArquivo);
            $validatedData['imagem'] = 'images/'.$nomeArquivo;
        }

        Item::create($validatedData);

        return redirect()->route('item.index')
                       ->with('success', 'Item criado com sucesso!');
    }

    // MÉTODO EDIT ADICIONADO AQUI
    public function edit(Item $item)
    {
        $categorias = Categoria::all();
        return view('item.edit', compact('item', 'categorias'));
    }

    public function update(Request $request, Item $item)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('imagem')) {
            if ($item->imagem && file_exists(public_path($item->imagem))) {
                unlink(public_path($item->imagem));
            }

            $pastaDestino = public_path('images');
            $nomeArquivo = 'item_'.time().'.'.$request->imagem->extension();
            $request->imagem->move($pastaDestino, $nomeArquivo);
            $validatedData['imagem'] = 'images/'.$nomeArquivo;
        }

        $item->update($validatedData);

        return redirect()->route('item.index')
                       ->with('success', 'Item atualizado com sucesso!');
    }

    public function destroy(Item $item)
    {
        if ($item->imagem && file_exists(public_path($item->imagem))) {
            unlink(public_path($item->imagem));
        }

        $item->delete();

        return redirect()->route('item.index')
                       ->with('success', 'Item excluído com sucesso!');
    }

    public function excluirImagem(Item $item)
    {
        if ($item->imagem && file_exists(public_path($item->imagem))) {
            unlink(public_path($item->imagem));
            $item->update(['imagem' => null]);
        }

        return back()->with('success', 'Imagem excluída com sucesso!');
    }
}
