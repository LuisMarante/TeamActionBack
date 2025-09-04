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
        Schema::create('analise_eventos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jogo_id')->constrained('eventos');
            $table->foreignId('utilizador_id')->constrained('users');
            $table->datetime('inicio_analise')->nullable();
            $table->datetime('fim_analise')->nullable();
            $table->text('observacoes_gerais')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analise_eventos');
    }
};
