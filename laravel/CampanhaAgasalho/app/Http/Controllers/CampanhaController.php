<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Local;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class CampanhaController extends Controller
{
    public function index()
    {
        $locais = Local::all();

        $maisDoados = Item::select('itens.*')
            ->addSelect(DB::raw('COALESCE((
                SELECT SUM(im.qtd)
                FROM itens_movimento im
                JOIN movimentos m ON im.movimento_id = m.id
                WHERE im.item_id = itens.id AND m.tipo_movimento = 2
            ), 0) as quantidade_saida'))
            ->orderByDesc('quantidade_saida')
            ->take(12)
            ->get();

        $semEstoque = Item::where('estoque', 0)->get();

        return view('campanha', compact('locais', 'maisDoados', 'semEstoque'));
    }
}
