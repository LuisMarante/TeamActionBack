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
    Schema::create('convocatoria', function (Blueprint $table) {
        $table->id();

        // Chave estrangeira para evento
        $table->foreignId('evento_id')
              ->constrained('evento')
              ->onDelete('cascade');

        // Chave estrangeira para jogador
        $table->foreignId('jogador_id')
              ->constrained('jogador')
              ->onDelete('cascade');

        $table->string('estado_presenca', 100)->nullable();
        $table->text('justificativa')->nullable();
        $table->boolean('titular')->default(false);
        $table->boolean('capitao')->default(false);
        $table->timestamp('data_convocacao')->nullable();
        $table->timestamp('updated_at')->nullable();

        // Chave única composta para evitar duplicados
        $table->unique(['evento_id', 'jogador_id']);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convocatoria');
    }
};
