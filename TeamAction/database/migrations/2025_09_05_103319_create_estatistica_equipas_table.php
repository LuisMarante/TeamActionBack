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
        Schema::create('estatistica_equipas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipa_id')->constrained('equipas')->onDelete('cascade');
            $table->foreignId('jogo_id')->constrained('eventos')->onDelete('cascade');
            $table->integer('posse_bola_percentagem')->default(0);
            $table->integer('remates_totais')->default(0);
            $table->integer('remates_baliza')->default(0);
            $table->integer('passes_totais')->default(0);
            $table->integer('passes_completados')->default(0);
            $table->integer('perdas_bola_totais')->default(0);
            $table->integer('faltas_totais')->default(0);
            $table->integer('golos_marcados')->default(0);
            $table->integer('golos_sofridos')->default(0);
            $table->integer('pontos')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estatistica_equipas');
    }
};
