<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TarefaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tarefas')->insert([
            [
                'atribuida_por_id' => 1, // Assumindo que o user com id 1 existe
                'atribuida_a_id' => 2, // Assumindo que o user com id 2 existe
                'titulo' => 'Organizar equipamento',
                'descricao' => 'Garantir que os equipamentos de treino estão prontos para o próximo treino.',
                'prioridade' => 'Alta',
                'estado' => 'Pendente',
                'data_limite' => Carbon::create(2025, 11, 27, 18, 0, 0),
                'data_conclusao' => null,
                'evento_id' => 2, // Relacionado com o 'Treino Tático'
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'atribuida_por_id' => 1,
                'atribuida_a_id' => 3,
                'titulo' => 'Analisar adversário',
                'descricao' => 'Estudar os últimos três jogos do adversário e fazer um relatório.',
                'prioridade' => 'Média',
                'estado' => 'Em Progresso',
                'data_limite' => Carbon::create(2025, 11, 30, 23, 59, 0),
                'data_conclusao' => null,
                'evento_id' => 1, // Relacionado com a 'Final da Liga Nacional'
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'atribuida_por_id' => 2,
                'atribuida_a_id' => 2,
                'titulo' => 'Confirmar presença',
                'descricao' => 'Confirmar a presença de todos os jogadores para o treino.',
                'prioridade' => 'Baixa',
                'estado' => 'Concluída',
                'data_limite' => Carbon::create(2025, 11, 26, 12, 0, 0),
                'data_conclusao' => Carbon::create(2025, 11, 26, 10, 30, 0),
                'evento_id' => 2, // Relacionado com o 'Treino Tático'
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
