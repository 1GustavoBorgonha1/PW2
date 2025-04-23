<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemMovimento extends Model
{
    protected $table = 'itens_movimento';
    protected $fillable = ['item_id', 'qtd', 'movimento_id']; // Corrigido nome do campo

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function movimento() //alterado o nome da função de Movimento para movimento
    {
        return $this->belongsTo(Movimento::class);
    }
}
