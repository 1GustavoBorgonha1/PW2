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
        Schema::create('itens_movimento', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id')->nullable();;
            $table->integer('qtd');
            $table->unsignedBigInteger('movimento_id')->nullable();
            $table->timestamps();

            // Definindo a chave estrangeira
            $table->foreign('item_id')
                  ->references('id')
                  ->on('itens');

            $table->foreign('movimento_id')
                  ->references('id')
                  ->on('movimentos')
                  ->onDelete('cascade'); // Remove os itens associados se o movimento for deletado

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itens_movimento');
    }
};
