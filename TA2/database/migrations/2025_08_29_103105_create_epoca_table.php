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
        Schema::create('epoca', function (Blueprint $table) {
            $table->id(); // Coluna id auto-increment
            $table->string('nome', 255); // VARCHAR(255)
            $table->date('data_inicio'); // DATE
            $table->date('data_fim'); // DATE
            $table->text('descricao')->nullable(); // TEXT, pode ser NULL
            $table->boolean('ativa')->default(false); // BOOLEAN com valor padrão FALSE
            $table->timestamps(); // created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('epoca');
    }
};
