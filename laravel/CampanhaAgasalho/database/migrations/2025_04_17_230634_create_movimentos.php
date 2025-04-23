<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movimentos', function (Blueprint $table) {
            $table->id();
            $table->string('observacao');
            $table->unsignedBigInteger('local_id');
            $table->integer('tipo_movimento');
            $table->timestamps();

            // Definindo a chave estrangeira
            $table->foreign('local_id')
                  ->references('id')
                  ->on('locais');

        });
    }
};
