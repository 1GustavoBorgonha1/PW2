<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SonoModel;

class SonoController extends Controller
{
    public function index()
    {
        return view('SonoView'); // Exibe a página inicial com o formulário
    }

    public function classificar(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'idade' => 'required|integer|min:0',
            'horas' => 'required|numeric|min:0',
            'mes' => 'nullable|integer|min:0|max:12',
        ]);

        // Pegando os dados do formulário
        $idade = $request->input('idade');
        $horas = $request->input('horas');
        $mes = $request->input('mes', null);

        // Chamando o método de classificação de sono
        $classificacao = SonoModel::classificar($idade, $horas, $mes);

        // Retornando a view de resultado
        return view('ResultSonoView', compact('idade', 'horas', 'mes', 'classificacao'));
        }
}
