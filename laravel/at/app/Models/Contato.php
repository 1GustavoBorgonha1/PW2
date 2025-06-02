<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'cidade',
        'estado',
        'tipo_contato_id'
    ];

    public function tipoContato()
    {
        return $this->belongsTo(TipoContato::class);
    }
}
