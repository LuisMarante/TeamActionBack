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
    Schema::create('analise_evento', function (Blueprint $table) {
        $table->id();

        // Chave estrangeira para evento (jogo)
        $table->foreignId('jogo_id')
              ->constrained('evento')
              ->onDelete('cascade');

        // Chave estrangeira para utilizador
        $table->foreignId('utilizador_id')
              ->nullable()
              ->constrained('users')
              ->onDelete('set null');

        $table->timestamp('inicio_analise')->nullable();
        $table->timestamp('fim_analise')->nullable();
        $table->text('observacoes_gerais')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analise_evento');
    }
};
