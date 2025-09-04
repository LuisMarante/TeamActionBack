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
        Schema::create('epocas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->text('descricao')->nullable();
            $table->boolean('ativa')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('epocas');
    }
};
