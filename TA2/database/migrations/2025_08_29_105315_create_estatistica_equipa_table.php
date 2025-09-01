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
    Schema::create('estatistica_equipa', function (Blueprint $table) {
        $table->id();

        // Chave estrangeira para equipa
        $table->foreignId('equipa_id')
              ->constrained('equipa')
              ->onDelete('cascade');

        // Chave estrangeira para evento (jogo)
        $table->foreignId('jogo_id')
              ->constrained('evento')
              ->onDelete('cascade');

        // Estatísticas da equipa
        $table->integer('posse_bola_percentagem')->nullable();
        $table->integer('remates_totais')->default(0);
        $table->integer('remates_baliza')->default(0);
        $table->integer('passes_totais')->default(0);
        $table->integer('passes_completados')->default(0);
        $table->integer('perdas_bola_totais')->default(0);
        $table->integer('faltas_totais')->default(0);

        // Chave única composta
        $table->unique(['equipa_id', 'jogo_id']);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estatistica_equipa');
    }
};
