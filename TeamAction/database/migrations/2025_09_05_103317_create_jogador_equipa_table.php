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
            $table->foreignId('jogador_id')->constrained('jogadores')->onDelete('cascade');
            $table->foreignId('equipa_id')->constrained('equipas')->onDelete('cascade');
            $table->date('data_entrada')->nullable();
            $table->date('data_saida')->nullable();
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
