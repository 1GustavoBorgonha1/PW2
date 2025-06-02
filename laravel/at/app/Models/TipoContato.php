<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoContato extends Model
{
    protected $fillable = [
        'tipo_contato',
    ];

    public function contatos()
    {
        return $this->hasMany(Contato::class);
    }
}
