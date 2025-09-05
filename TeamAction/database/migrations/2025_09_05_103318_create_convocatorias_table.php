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
        Schema::create('convocatorias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->constrained('eventos')->onDelete('cascade');
            $table->foreignId('jogador_id')->constrained('jogadores')->onDelete('cascade');
            $table->string('estado_presenca', 50)->nullable();
            $table->text('justificativa')->nullable();
            $table->boolean('titular')->default(false);
            $table->boolean('capitao')->default(false);
            $table->dateTime('data_convocacao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convocatorias');
    }
};
