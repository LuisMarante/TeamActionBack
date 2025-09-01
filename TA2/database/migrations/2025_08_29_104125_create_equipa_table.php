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
    Schema::create('equipa', function (Blueprint $table) {
        $table->id();
        $table->string('nome', 255);
        $table->string('modalidade', 100)->nullable();
        $table->string('categoria', 100)->nullable();
        $table->integer('ano_fundacao')->nullable();
        $table->string('logo_url', 255)->nullable();
        $table->string('local_treino', 255)->nullable();

        // Chave estrangeira para user (treinador)
        $table->foreignId('user_id')
              ->nullable()
              ->constrained('users')
              ->onDelete('set null');

        // Chave estrangeira para clube
        $table->foreignId('clube_id')
              ->nullable()
              ->constrained('clube')
              ->onDelete('set null');

        $table->text('descricao')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipa');
    }
};
