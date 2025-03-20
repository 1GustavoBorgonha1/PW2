<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ImcModel;

class ImcController extends Controller
{
   public function index()
   {
       return view('ImcView');
   }

   public function calcular(Request $request)
   {
        $request->validate([
            'peso' => 'required|numeric|min:1',
            'altura' => 'required|numeric|min:0.5',
        ]);

        $resultado = ImcModel::calcular($request->peso, $request->altura);

        return view('ImcResultView', [
            'imc' => ($resultado['valor']),
            'categoria' => $resultado['categoria']
        ]);
   }

}
