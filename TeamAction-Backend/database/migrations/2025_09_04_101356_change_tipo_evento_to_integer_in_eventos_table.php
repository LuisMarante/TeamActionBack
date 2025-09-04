<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('eventos', function (Blueprint $table) {
            // Alterar o tipo de VARCHAR para INT
            $table->integer('tipo_evento')->change();
        });
    }

    public function down()
    {
        Schema::table('eventos', function (Blueprint $table) {
            // Reverter para VARCHAR se necessário
            $table->string('tipo_evento', 100)->change();
        });
    }
};