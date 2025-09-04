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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_evento', 100);
            $table->string('titulo');
            $table->text('descricao')->nullable();
            $table->date('data');
            $table->time('hora_inicio')->nullable();
            $table->time('hora_fim')->nullable();
            $table->string('local')->nullable();
            $table->foreignId('equipa_id')->constrained('equipas');
            $table->string('adversario')->nullable();
            $table->string('visibilidade', 100)->nullable();
            $table->string('estado', 100)->nullable();
            $table->integer('golosEquipa')->nullable();
            $table->integer('golosAdversario')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
