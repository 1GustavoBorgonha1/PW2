<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemMovimento extends Model
{
    protected $table = 'itens_movimento';
    protected $fillable = ['movimento_id', 'item_id', 'qtd'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function movimento()
    {   
        return $this->belongsTo(Movimento::class);
    }
}

