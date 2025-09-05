<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EstatisticaJogadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estatistica_jogadores')->insert([
            // Estatísticas para o Jogo 1 (Final da Liga Nacional)
            [
                'jogador_id' => 1, // Jogador de Exemplo 1
                'jogo_id' => 1,
                'equipa_id' => 1,
                'remates_tentados' => 5,
                'remates_convertidos' => 2,
                'passes_tentados' => 45,
                'passes_completados' => 40,
                'perdas_bola' => 5,
                'recuperacoes_bola' => 3,
                'defesas' => 0,
                'faltas_cometidas' => 1,
                'faltas_sofridas' => 2,
                'minutos_jogados' => 90,
                'cartaoAmarelo' => 0,
                'cartaoVermelho' => 0,
                'cartaoAzul' => 0,
                'golos_marcados' => 2,
                'golos_sofridos' => 0,
                'dribles_tentados' => 7,
                'dribles_completados' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jogador_id' => 2, // Jogador de Exemplo 2
                'jogo_id' => 1,
                'equipa_id' => 1,
                'remates_tentados' => 3,
                'remates_convertidos' => 1,
                'passes_tentados' => 50,
                'passes_completados' => 48,
                'perdas_bola' => 2,
                'recuperacoes_bola' => 5,
                'defesas' => 0,
                'faltas_cometidas' => 0,
                'faltas_sofridas' => 1,
                'minutos_jogados' => 90,
                'cartaoAmarelo' => 1,
                'cartaoVermelho' => 0,
                'cartaoAzul' => 0,
                'golos_marcados' => 1,
                'golos_sofridos' => 0,
                'dribles_tentados' => 2,
                'dribles_completados' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Estatísticas para o Jogo 2 (Treino Tático)
            [
                'jogador_id' => 3, // Jogador de Exemplo 3
                'jogo_id' => 2,
                'equipa_id' => 2,
                'remates_tentados' => 1,
                'remates_convertidos' => 0,
                'passes_tentados' => 30,
                'passes_completados' => 28,
                'perdas_bola' => 3,
                'recuperacoes_bola' => 2,
                'defesas' => 0,
                'faltas_cometidas' => 0,
                'faltas_sofridas' => 0,
                'minutos_jogados' => 60,
                'cartaoAmarelo' => 0,
                'cartaoVermelho' => 0,
                'cartaoAzul' => 0,
                'golos_marcados' => 0,
                'golos_sofridos' => 0,
                'dribles_tentados' => 0,
                'dribles_completados' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
