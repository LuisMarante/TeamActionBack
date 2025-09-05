<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnaliseEventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('analise_eventos')->insert([
            [
                'jogo_id' => 1, // Final da Liga Nacional
                'utilizador_id' => 1, // Treinador
                'inicio_analise' => Carbon::create(2025, 12, 1, 10, 0, 0),
                'fim_analise' => Carbon::create(2025, 12, 1, 12, 30, 0),
                'observacoes_gerais' => 'Análise tática completa do jogo contra o adversário X. Pontos fracos e fortes identificados, com foco na transição defensiva.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jogo_id' => 2, // Treino Tático
                'utilizador_id' => 2, // Treinador adjunto
                'inicio_analise' => Carbon::create(2025, 11, 27, 9, 0, 0),
                'fim_analise' => Carbon::create(2025, 11, 27, 10, 0, 0),
                'observacoes_gerais' => 'Avaliação do desempenho individual e coletivo no treino. Foco na comunicação e movimentação sem bola.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
