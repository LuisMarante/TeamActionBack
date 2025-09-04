<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('eventos', function (Blueprint $table) {
            $table->datetime('data_hora_inicio')->nullable()->after('data');
            $table->integer('duracao')->nullable()->after('hora_fim')->comment('Duração em minutos');
        });
    }

    public function down()
    {
        Schema::table('eventos', function (Blueprint $table) {
            $table->dropColumn(['data_hora_inicio', 'duracao']);
        });
    }
};