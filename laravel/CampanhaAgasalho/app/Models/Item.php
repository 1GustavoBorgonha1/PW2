<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'itens'; // Define explicitamente o nome da tabela
    protected $fillable = ['nome', 'descricao','categoria_id','estoque'];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

}
