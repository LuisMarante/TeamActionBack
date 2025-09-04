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
        Schema::create('jogador_equipas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jogador_id')->constrained('jogadores');
            $table->foreignId('equipa_id')->constrained('equipas');
            $table->date('data_entrada')->nullable();
            $table->date('data_saida')->nullable();
            $table->boolean('titular')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jogador_equipas');
    }
};
