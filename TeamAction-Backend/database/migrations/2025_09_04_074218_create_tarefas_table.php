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
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('atribuida_por_id')->nullable()->constrained('users');
            $table->foreignId('atribuida_a_id')->nullable()->constrained('users');
            $table->text('titulo');
            $table->text('descricao')->nullable();
            $table->string('prioridade', 50)->nullable();
            $table->string('estado', 50)->nullable();
            $table->datetime('data_limite')->nullable();
            $table->datetime('data_conclusao')->nullable();
            $table->foreignId('evento_id')->nullable()->constrained('eventos');
            $table->boolean('visivel_para_equipa')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};
