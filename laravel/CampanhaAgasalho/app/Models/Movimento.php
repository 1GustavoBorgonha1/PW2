<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimento extends Model
{
    protected $table = 'movimentos';
    protected $fillable = ['observacao', 'local_id', 'tipo_movimento'];

    public function itens()
    {
        return $this->belongsToMany(Item::class, 'itens_movimento')
                    ->withPivot('qtd')
                    ->withTimestamps();
    }

    public function local()
    {
        return $this->belongsTo(Local::class, 'local_id');
    }


}

