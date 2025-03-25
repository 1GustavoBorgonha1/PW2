<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GastoModel;

class GastoController extends Controller
{
    public function index()
    {
        return view('GastoView');
    }

    public function calcular(Request $request)
    {
        // Validação dos campos
        $request->validate([
            'combustivel' => 'required|string',
            'valor' => 'required|numeric|min:0',
            'distancia' => 'required|numeric|min:0',
            'consumo' => 'required|numeric|min:0'
        ]);

        // Pegando os dados do formulário
        $combustivel = $request->input('combustivel');
        $valorCombustivel = $request->input('valor');
        $distancia = $request->input('distancia');
        $consumo = $request->input('consumo');

        // Chamando o modelo para calcular
        $gastoTotal = GastoModel::calcularGasto($valorCombustivel, $distancia, $consumo);

        // Retornando a view de resultado
        return view('ResultGastoView', [
            'gastoTotal' => $gastoTotal,
            'combustivel' => $combustivel
        ]);
    }
}
