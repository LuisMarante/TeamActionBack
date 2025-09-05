<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EquipaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('equipas')->insert([
            [
                'nome' => 'Tubarões do Rio',
                'modalidade' => 'Futebol',
                'categoria' => 'Sénior',
                'ano_fundacao' => 2010,
                'logo_url' => 'http://example.com/logos/equipa1.png',
                'local_treino' => 'Campo da Cidade',
                'local_jogo' => 'Estádio Municipal',
                'descricao' => 'Equipa principal de futebol, campeã em 2024.',
                'clube_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'Basquetebolistas da Praia',
                'modalidade' => 'Basquetebol',
                'categoria' => 'Sub-20',
                'ano_fundacao' => 2018,
                'logo_url' => 'http://example.com/logos/equipa2.png',
                'local_treino' => 'Pavilhão 2',
                'local_jogo' => 'Pavilhão Principal',
                'descricao' => 'Equipa jovem de basquetebol.',
                'clube_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'Equipa Vencedora',
                'modalidade' => 'Voleibol',
                'categoria' => 'Sénior',
                'ano_fundacao' => 2005,
                'logo_url' => 'http://example.com/logos/equipa3.png',
                'local_treino' => 'Ginásio Central',
                'local_jogo' => 'Pavilhão do Clube',
                'descricao' => 'Equipa feminina de voleibol.',
                'clube_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}