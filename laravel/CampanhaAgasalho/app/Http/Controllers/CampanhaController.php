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
        $maisMovimentados = Item::select('itens.*', DB::raw('count(itens_movimento.item_id) as movimentos_count'))
            ->join('itens_movimento', 'itens.id', '=', 'itens_movimento.item_id')
            ->groupBy('itens.id')
            ->orderByDesc('movimentos_count')
            ->take(10)
            ->get();
        $semEstoque = Item::where('estoque', 0)->get();

        // Altere para usar o layout 'campanha'
        return view('campanha', compact('locais', 'maisMovimentados', 'semEstoque'));
    }
}
