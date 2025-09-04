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
        Schema::create('estatistica_jogadores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jogador_id')->constrained('jogadores');
            $table->foreignId('jogo_id')->constrained('eventos');
            $table->foreignId('equipa_id')->constrained('equipas');
            $table->integer('remates_tentados')->default(0);
            $table->integer('remates_convertidos')->default(0);
            $table->integer('passes_tentados')->default(0);
            $table->integer('passes_completados')->default(0);
            $table->integer('perdas_bola')->default(0);
            $table->integer('recuperacoes_bola')->default(0);
            $table->integer('defesas')->default(0);
            $table->integer('faltas_cometidas')->default(0);
            $table->integer('faltas_sofridas')->default(0);
            $table->integer('minutos_jogados')->default(0);
            $table->integer('cartaoAmarelo')->default(0);
            $table->integer('cartaoVermelho')->default(0);
            $table->integer('cartaoAzul')->default(0);
            $table->integer('golos_marcados')->default(0);
            $table->integer('golos_sofridos')->default(0);
            $table->integer('dribles_tentados')->default(0);
            $table->integer('dribles_completados')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estatistica_jogadores');
    }
};
