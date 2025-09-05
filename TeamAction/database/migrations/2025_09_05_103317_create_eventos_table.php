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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo_evento');
            $table->string('titulo');
            $table->text('descricao')->nullable();
            $table->dateTime('data_hora_inicio');
            $table->dateTime('data_hora_fim')->nullable();
            $table->string('local')->nullable();
            $table->foreignId('equipa_id')->nullable()->constrained('equipas')->onDelete('cascade');
            $table->string('adversario')->nullable();
            $table->boolean('realizado')->default(false);
            $table->string('estado', 100)->nullable();
            $table->integer('golosEquipa')->nullable();
            $table->integer('golosAdversario')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
