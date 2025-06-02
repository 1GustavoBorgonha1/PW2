<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato; // Import the Contato model
use App\Models\TipoContato; // Import the TipoContato model
use Dotenv\Store\File\Paths;

class ContatosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all contacts from the database
        //$contatos = Contato::all();
        $contatos = Contato::paginate(3);
        //$contatos = Contato::simplePaginate(2);
        $q = null;

        // Return the view with the contacts data
        return view('contatos.index', compact('contatos','q'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view for creating a new contact
        $tipocontatos = TipoContato::all();
        return view('contatos.create', compact('tipocontatos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'required|string|max:20',
            'foto' => 'image|max:2048'
        ]);

        // Create a new contact
        $contato = new Contato();
        $contato->nome = $request->input('nome');
        $contato->email = $request->input('email');
        $contato->telefone = $request->input('telefone');
        $contato->cidade = $request->input('cidade');
        $contato->estado = $request->input('estado');
        if ($foto = $request->file('foto')) {
            $filename = date('YmdHis').$foto->getClientOriginalName();
            $foto->move(public_path('fotos'),$filename);
            $contato->foto = $filename;
        }
        $contato->tipo_contato_id = $request->input('tipo_contato_id');
        if ($contato->save()) {
            // If the contact is saved successfully, redirect to the index page
            return redirect()->route('contatos.index')->with('success', 'Contato criado com sucesso!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the contact by ID
        $contato = Contato::findOrFail($id);

        // Return the view with the contact data
        return view('contatos.show', compact('contato'));
    }

    public function search(Request $request)
    {
        $q=$request->input('q');
        // Search for contacts based on the search input
        /*
        $contatos = Contato::where('nome', 'like', '%' . $request->input('q') . '%')
            ->orWhere('email', 'like', '%' . $request->input('q') . '%')
            ->get();
        */


        $contatos = Contato::where('nome', 'like', '%' . $request->input('q') . '%')
            ->orWhere('email', 'like', '%' . $request->input('q') . '%')
            ->paginate(3);

        // Return the view with the search results
        return view('contatos.index', compact('contatos', 'q'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contato = Contato::findOrFail($id);
        $tipocontatos = TipoContato::all();
        return view('contatos.edit', compact('contato', 'tipocontatos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'required|string|max:20',
            'foto' => 'image|max:2048',
        ]);

        // Create a new contact
        $contato = Contato::findOrFail($id);
        $contato->nome = $request->input('nome');
        $contato->email = $request->input('email');
        $contato->telefone = $request->input('telefone');
        $contato->cidade = $request->input('cidade');
        $contato->estado = $request->input('estado');
        if ($foto = $request->file('foto')) {
            $filename = date('YmdHis').$foto->getClientOriginalName();
            $foto->move(public_path('fotos'),$filename);
            $contato->foto = $filename;
        }
        $contato->tipo_contato_id = $request->input('tipo_contato_id');
        if ($contato->save()) {
            // If the contact is saved successfully, redirect to the index page
            return redirect()->route('contatos.index')->with('success', 'Contato alterado com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contato = Contato::FindorFail($id);
        if ($contato->delete()) {
            if (file_exists(public_path('fotos').DIRECTORY_SEPARATOR.$contato->foto) and $contato->foto != null) {
                // Delete the photo file from the server
                unlink(public_path('fotos').DIRECTORY_SEPARATOR.$contato->foto);
            }
            return redirect()->route("contatos.index")->with('success', 'Contato excluído');
        }
    }

    /**
     * Responseto contact api
    */
    public function apiIndex()
    {
        // Fetch all contacts from the database
        $contatos = Contato::all();

        // Return the contacts as a JSON response
        return response()->json($contatos);
    }

    public function apiShow($id)
    {
        // Find the contact by ID
        $contato = Contato::findOrFail($id);

        // Return the contact as a JSON response
        return response()->json($contato);
    }

}
