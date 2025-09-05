<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ConvocatoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('convocatorias')->insert([
            [
                'evento_id' => 1, // Final da Liga Nacional
                'jogador_id' => 1, // Rui Costa
                'estado_presenca' => 'Confirmado',
                'justificativa' => null,
                'titular' => true,
                'capitao' => false,
                'data_convocacao' => Carbon::create(2025, 11, 28, 10, 0, 0),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'evento_id' => 1,
                'jogador_id' => 2, // Diogo Fernandes
                'estado_presenca' => 'Confirmado',
                'justificativa' => null,
                'titular' => true,
                'capitao' => false,
                'data_convocacao' => Carbon::create(2025, 11, 28, 10, 0, 0),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'evento_id' => 1,
                'jogador_id' => 3, // Luís Pinto
                'estado_presenca' => 'Confirmado',
                'justificativa' => null,
                'titular' => false,
                'capitao' => true,
                'data_convocacao' => Carbon::create(2025, 11, 28, 10, 0, 0),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'evento_id' => 2, // Treino Tático
                'jogador_id' => 1, // Rui Costa
                'estado_presenca' => 'Confirmado',
                'justificativa' => null,
                'titular' => true,
                'capitao' => false,
                'data_convocacao' => Carbon::create(2025, 11, 25, 9, 0, 0),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'evento_id' => 2,
                'jogador_id' => 2, // Diogo Fernandes
                'estado_presenca' => 'Ausente',
                'justificativa' => 'Lesão no pé',
                'titular' => false,
                'capitao' => false,
                'data_convocacao' => Carbon::create(2025, 11, 25, 9, 0, 0),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
