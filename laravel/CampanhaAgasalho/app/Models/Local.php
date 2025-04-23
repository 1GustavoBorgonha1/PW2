<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $table = 'locais';
    protected $fillable = ['identifica', 'rua', 'numero', 'bairro', 'cep', 'cidade', 'estado', 'complemento', 'pontoreferencia'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
