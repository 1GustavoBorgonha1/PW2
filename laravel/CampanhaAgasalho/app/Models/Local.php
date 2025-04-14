<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $table = 'locais';
    protected $fillable = ['nome', 'descricao', 'categoria_id', /* ... outros campos ... */];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
