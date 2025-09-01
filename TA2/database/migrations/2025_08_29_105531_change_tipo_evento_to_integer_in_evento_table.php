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
    Schema::table('evento', function (Blueprint $table) {
        // Alterar de string para integer
        $table->integer('tipo_evento')->change();
    });
}

    /**
     * Reverse the migrations.
     */
  public function down(): void
{
    Schema::table('evento', function (Blueprint $table) {
        // Reverter para string em caso de rollback
        $table->string('tipo_evento', 100)->change();
    });
}
};
