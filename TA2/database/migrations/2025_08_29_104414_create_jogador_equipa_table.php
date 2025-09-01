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
    Schema::create('jogador_equipa', function (Blueprint $table) {
        $table->id();

        // Chave estrangeira para jogador
        $table->foreignId('jogador_id')
              ->constrained('jogador')
              ->onDelete('cascade');

        // Chave estrangeira para equipa
        $table->foreignId('equipa_id')
              ->constrained('equipa')
              ->onDelete('cascade');

        $table->date('data_entrada')->nullable();
        $table->date('data_saida')->nullable();
        $table->boolean('titular')->default(false);

        // Chave única composta
        $table->unique(['jogador_id', 'equipa_id', 'data_entrada']);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jogador_equipa');
    }
};
