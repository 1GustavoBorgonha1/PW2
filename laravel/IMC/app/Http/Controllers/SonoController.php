<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SonoController extends Controller
{
    public function index()
    {
        return view('SonoView');
    }

    public function calcular(Request $request)
    {
         $request->validate([
             'peso' => 'required|numeric|min:1',
             'altura' => 'required|numeric|min:1',
         ]);

         $resultado = ImcModel::calcular($request->peso, $request->altura);

         return view('ImcResultView', [
             'imc' => ($resultado['valor']),
             'categoria' => $resultado['categoria']
         ]);
    }
}
