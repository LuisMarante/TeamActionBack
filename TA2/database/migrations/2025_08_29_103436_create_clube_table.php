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
        Schema::create('clube', function (Blueprint $table) {
            $table->id();
            $table->foreignId('epoca_id')
                  ->nullable()
                  ->constrained('epoca')  // Refere-se à tabela epoca
                  ->onDelete('set null'); // Se epoca for eliminada, fica NULL

            $table->string('nome', 255);
            $table->string('cidade', 255)->nullable();
            $table->string('logo_url', 255)->nullable();
            $table->string('contacto', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clube');
    }
};
