<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $table = 'veiculos'; // Define explicitamente o nome da tabela
    protected $fillable = ['modelo', 'descricao','placa','kilometragem','marca_id'];
    public function categoria()
    {
        return $this->belongsTo(Marca::class);
    }

}
