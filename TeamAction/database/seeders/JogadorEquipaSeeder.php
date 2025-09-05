<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JogadorEquipaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jogador_equipa')->insert([
            [
                'jogador_id' => 1, // Rui Costa
                'equipa_id' => 1, // Tubarões do Rio (Futebol)
                'data_entrada' => Carbon::create(2024, 8, 1),
                'data_saida' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jogador_id' => 2, // Diogo Fernandes
                'equipa_id' => 1, // Tubarões do Rio (Futebol)
                'data_entrada' => Carbon::create(2024, 8, 1),
                'data_saida' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jogador_id' => 3, // Luís Pinto
                'equipa_id' => 1, // Tubarões do Rio (Futebol)
                'data_entrada' => Carbon::create(2024, 8, 1),
                'data_saida' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jogador_id' => 4, // Sara Mendes
                'equipa_id' => 3, // Equipa Vencedora (Voleibol)
                'data_entrada' => Carbon::create(2024, 9, 10),
                'data_saida' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'jogador_id' => 5, // André Neves
                'equipa_id' => 2, // Basquetebolistas da Praia (Basquetebol)
                'data_entrada' => Carbon::create(2024, 9, 15),
                'data_saida' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
