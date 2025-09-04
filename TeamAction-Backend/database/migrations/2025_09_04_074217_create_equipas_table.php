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
        Schema::create('equipas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('modalidade', 50)->nullable();
            $table->string('categoria', 50)->nullable();
            $table->integer('ano_fundacao')->nullable();
            $table->string('logo_url')->nullable();
            $table->string('local_treino')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->text('descricao')->nullable();
            $table->foreignId('clube_id')->nullable()->constrained('clubes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipas');
    }
};
