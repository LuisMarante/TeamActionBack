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
        Schema::table('eventos', function (Blueprint $table) {
            // Remover a coluna antiga
            $table->dropColumn('adversario');
        });

        Schema::table('eventos', function (Blueprint $table) {
            // Adicionar a nova coluna como inteiro
            // Se for uma FK para equipas:
            $table->foreignId('adversario_id')
                  ->nullable()
                  ->after('equipa_id')
                  ->constrained('equipas')
                  ->onDelete('set null');

            // OU se for apenas um inteiro sem FK:
            // $table->integer('adversario_id')->nullable()->after('equipa_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('eventos', function (Blueprint $table) {
            // Reverter - remover adversario_id
            $table->dropForeign(['adversario_id']);
            $table->dropColumn('adversario_id');
        });

        Schema::table('eventos', function (Blueprint $table) {
            // Recriar como string
            $table->string('adversario')->nullable()->after('equipa_id');
        });
    }
};
