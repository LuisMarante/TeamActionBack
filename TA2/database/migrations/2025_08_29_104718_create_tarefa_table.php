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
    Schema::create('tarefa', function (Blueprint $table) {
        $table->id();

        // Chave estrangeira para user que atribui a tarefa
        $table->foreignId('atribuida_por_id')
              ->nullable()
              ->constrained('users')
              ->onDelete('set null');

        // Chave estrangeira para user que recebe a tarefa
        $table->foreignId('atribuida_a_id')
              ->nullable()
              ->constrained('users')
              ->onDelete('set null');

        $table->text('titulo');
        $table->text('descricao')->nullable();
        $table->string('prioridade', 50)->nullable();
        $table->string('estado', 50)->nullable();
        $table->timestamp('data_limite')->nullable();
        $table->timestamp('data_conclusao')->nullable();

        // Chave estrangeira para evento
        $table->foreignId('evento_id')
              ->nullable()
              ->constrained('evento')
              ->onDelete('set null');

        $table->boolean('visivel_para_equipa')->default(false);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefa');
    }
};
