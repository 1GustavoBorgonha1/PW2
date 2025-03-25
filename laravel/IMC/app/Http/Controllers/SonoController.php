<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SonoModel;
use Illuminate\Support\Facades\Log;

class SonoController extends Controller
{
    public function classificar(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'idade' => 'required|integer|min:0',
            'hora' => 'required|numeric|min:0',
            'mes' => 'nullable|integer|min:0|max:12',
        ]);

        // Pegando os dados do formulário
        $idade = $request->input('idade');
        $horas = $request->input('hora');
        $mes = $request->input('mes');
        $mes = $mes === "" ? null : (int) $mes;

        // Log para debug
        Log::info('Dados recebidos no controller:', [
            'idade' => $idade,
            'horas' => $horas,
            'mes' => $mes
        ]);

        // Chamando o método de classificação de sono
        $classificacao = SonoModel::classificar($idade, $horas, $mes);

        // Retornando a view de resultado
        return view('ResultSonoView', [
            'idade' => $idade,
            'hora' => $horas,
            'mes' => $mes,
            'classificacao' => $classificacao
        ]);
    }
}
