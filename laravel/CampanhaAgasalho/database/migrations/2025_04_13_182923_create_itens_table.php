<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('itens', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->unsignedBigInteger('categoria_id');
            $table->integer('estoque')->default(0);
            $table->timestamps();

            // Definindo a chave estrangeira
            $table->foreign('categoria_id')
                  ->references('id')
                  ->on('categorias');

        });
    }
};
