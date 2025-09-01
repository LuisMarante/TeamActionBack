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
    Schema::create('jogador', function (Blueprint $table) {
        $table->id();
        $table->string('nome', 255);
        $table->date('data_nascimento')->nullable();
        $table->string('posicao', 100)->nullable();
        $table->integer('numero_camisola')->nullable();
        $table->string('contacto', 255)->nullable();
        $table->string('morada', 255)->nullable();
        $table->boolean('ativo')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jogador');
    }
};
