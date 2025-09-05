<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EstatisticaEquipaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estatistica_equipas')->insert([
            // Estatísticas para o Jogo de Exemplo
            [
                'equipa_id' => 1, // Equipa Principal
                'jogo_id' => 1, // Final da Liga Nacional
                'posse_bola_percentagem' => 55,
                'remates_totais' => 18,
                'remates_baliza' => 9,
                'passes_totais' => 450,
                'passes_completados' => 380,
                'perdas_bola_totais' => 75,
                'faltas_totais' => 10,
                'golos_marcados' => 3,
                'golos_sofridos' => 1,
                'pontos' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'equipa_id' => 2, // Equipa B
                'jogo_id' => 2, // Treino Tático
                'posse_bola_percentagem' => 60,
                'remates_totais' => 15,
                'remates_baliza' => 8,
                'passes_totais' => 520,
                'passes_completados' => 480,
                'perdas_bola_totais' => 50,
                'faltas_totais' => 5,
                'golos_marcados' => 0,
                'golos_sofridos' => 0,
                'pontos' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
