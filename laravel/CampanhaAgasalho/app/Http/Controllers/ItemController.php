<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $itens = Item::when($search, function ($query, $search) {
            return $query->whereRaw('LOWER(nome) LIKE ?', ['%'.strtolower($search).'%']);
        })
        ->orderBy('id', 'desc')
        ->paginate(10);
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
            'foto' => 'nullable|image|max:2048',
        ]);

        $itemData = $request->only(['nome', 'descricao', 'categoria_id']);

        if ($request->hasFile('foto')) {
            $filename = date('YmdHis') . '_' . $request->file('foto')->getClientOriginalName();
            $path = $request->file('foto')->move(public_path('fotos'), $filename);
            $itemData['foto'] = 'fotos/' . $filename;
        }

        Item::create($itemData);

        return redirect()->route('item.index')
                    ->with('success', 'Item criado com sucesso!');
    }


    public function edit(string $id)
    {
        $item = Item::findOrFail($id);
        $categorias = Categoria::all();
        return view('item.edit', compact('item', 'categorias'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $item = Item::findOrFail($id);
        $oldPhoto = $item->foto;

        $item->nome = $validatedData['nome'];
        $item->descricao = $validatedData['descricao'];
        $item->categoria_id = $validatedData['categoria_id'];

        if ($request->hasFile('foto')) {
            try {
                $newPhotoPath = $this->storeNewImage($request->file('foto'), $validatedData['nome']);

                $item->foto = $newPhotoPath;

                if ($oldPhoto) {
                    $this->removeOldImage($oldPhoto);
                }

            } catch (\Exception $e) {
                report($e);
                return back()->with('error', 'Erro ao processar a imagem: '.$e->getMessage());
            }
        }

        if ($item->save()) {
            return redirect()->route('item.index')
                ->with('success', 'Item atualizado com sucesso!');
        }

        return back()->with('error', 'Erro ao atualizar o item');
    }

    protected function removeOldImage($path)
    {
        if (!$path) return false;

        $fullPath = public_path($path);

        if (strpos($fullPath, public_path('fotos')) !== 0) {
            return false;
        }

        if (file_exists($fullPath)) {
            try {
                return unlink($fullPath);
            } catch (\Exception $e) {
                return false;
            }
        }
        return false;
    }

    protected function storeNewImage($file, $itemName)
    {
        $extension = $file->extension();
        $filename = 'item_'.time().'_'.Str::slug($itemName).'.'.$extension;
        $destination = public_path('fotos');

        if (!file_exists($destination)) {
            mkdir($destination, 0755, true);
        }

        if ($file->move($destination, $filename)) {
            return 'fotos/'.$filename;
        }

        throw new \Exception("Falha ao mover arquivo para {$destination}/{$filename}");
    }

    public function show($id)
    {
        $item = Item::with('categoria')->findOrFail($id);

        return view('item.show', compact('item'));
    }


    public function destroy(Item $item)
    {
        if ($item->itensmovimento()->exists()) {
            return back()->with('error', 'Não foi possível excluir: existem movimentos vinculados a este item!');
        }

        if ($item->foto && file_exists(public_path($item->foto))) {
            unlink(public_path($item->foto));
        }

        $item->delete();

        return redirect()->route('item.index')
                    ->with('success', 'Item excluído com sucesso!');
    }


}
