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
    Schema::create('evento', function (Blueprint $table) {
        $table->id();
        $table->string('tipo_evento', 100);
        $table->string('titulo', 255)->nullable();
        $table->text('descricao')->nullable();
        $table->date('data');
        $table->time('hora_inicio')->nullable();
        $table->time('hora_fim')->nullable();
        $table->string('local', 255)->nullable();

        // Chave estrangeira para equipa
        $table->foreignId('equipa_id')
              ->nullable()
              ->constrained('equipa')
              ->onDelete('set null');

        $table->string('adversario', 255)->nullable();
        $table->string('visibilidade', 100)->nullable();
        $table->string('estado', 100)->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evento');
    }
};
