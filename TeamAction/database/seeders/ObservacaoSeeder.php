<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ObservacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('observacoes')->insert([
            [
                'jogo_id' => 1, // Final da Liga Nacional
                'utilizador_id' => 1, // Assumindo o utilizador principal
                'conteudo' => 'A equipa adversária está a pressionar muito no meio-campo. A nossa defesa precisa de reagir mais rapidamente.',
                'momento_jogo' => Carbon::create(2025, 11, 29, 15, 20, 0),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jogo_id' => 1,
                'utilizador_id' => 1,
                'conteudo' => 'A mobilidade do avançado #7 é excelente. Devia ser utilizado mais vezes nos contra-ataques.',
                'momento_jogo' => Carbon::create(2025, 11, 29, 16, 10, 0),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jogo_id' => 2, // Treino Tático
                'utilizador_id' => 2, // Outro utilizador
                'conteudo' => 'O exercício de passe foi bem executado. Os jogadores demonstraram boa comunicação e sincronia.',
                'momento_jogo' => Carbon::create(2025, 11, 26, 10, 45, 0),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
