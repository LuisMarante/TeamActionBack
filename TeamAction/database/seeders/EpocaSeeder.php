<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EpocaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('epocas')->insert([
            [
                'nome' => '2023/2024',
                'data_inicio' => '2023-09-01',
                'data_fim' => '2024-08-31',
                'descricao' => 'Época de transição.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => '2024/2025',
                'data_inicio' => '2024-09-01',
                'data_fim' => '2025-08-31',
                'descricao' => 'Época atual, focada em desenvolvimento.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => '2025/2026',
                'data_inicio' => '2025-09-01',
                'data_fim' => '2026-08-31',
                'descricao' => 'Época futura, com novos objetivos.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
