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
    Schema::create('estatistica_jogador', function (Blueprint $table) {
        $table->id();

        // Chave estrangeira para jogador
        $table->foreignId('jogador_id')
              ->constrained('jogador')
              ->onDelete('cascade');

        // Chave estrangeira para evento (jogo)
        $table->foreignId('jogo_id')
              ->constrained('evento')
              ->onDelete('cascade');

        // Chave estrangeira para equipa
        $table->foreignId('equipa_id')
              ->nullable()
              ->constrained('equipa')
              ->onDelete('set null');

        // Estatísticas
        $table->integer('remates_tentados')->default(0);
        $table->integer('remates_convertidos')->default(0);
        $table->integer('passes_tentados')->default(0);
        $table->integer('passes_completados')->default(0);
        $table->integer('perdas_bola')->default(0);
        $table->integer('recuperacoes_bola')->default(0);
        $table->integer('faltas_cometidas')->default(0);
        $table->integer('faltas_sofridas')->default(0);
        $table->integer('minutos_jogados')->default(0);

        // Chave única composta
        $table->unique(['jogador_id', 'jogo_id']);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estatistica_jogador');
    }
};
