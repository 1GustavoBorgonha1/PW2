<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'itens';
    protected $fillable = ['nome', 'descricao', 'categoria_id', 'estoque', 'foto', 'local_id'];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function movimentos()
    {
        return $this->hasMany(Movimento::class);
    }

        public function itensmovimento()
    {
        return $this->hasMany(ItemMovimento::class);
    }

}
