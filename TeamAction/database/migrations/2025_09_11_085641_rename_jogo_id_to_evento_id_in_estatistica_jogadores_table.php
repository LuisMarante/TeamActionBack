<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('estatistica_jogadores', function (Blueprint $table) {
            // Remover a foreign key antiga
            $table->dropForeign(['jogo_id']);

            // Renomear a coluna
            $table->renameColumn('jogo_id', 'evento_id');

            // Adicionar a foreign key com o nome correto
            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('estatistica_jogadores', function (Blueprint $table) {
            $table->dropForeign(['evento_id']);
            $table->renameColumn('evento_id', 'jogo_id');
            $table->foreign('jogo_id')->references('id')->on('eventos')->onDelete('cascade');
        });
    }
};
