<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('locais', function (Blueprint $table) {
            $table->id();
            $table->string('identifica')->unique();
            $table->string('rua');
            $table->integer('numero');
            $table->string('bairro');
            $table->string('cep');
            $table->string('cidade');
            $table->string('estado', 2);
            $table->string('complemento')->nullable();
            $table->string('pontoreferencia')->nullable();
            $table->timestamps();
        });
    }

};
