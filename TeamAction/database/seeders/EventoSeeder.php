<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('eventos')->insert([
            // Jogos
            [
                'tipo_evento' => 1, // Jogo
                'titulo' => 'Final da Liga Nacional',
                'descricao' => 'Jogo decisivo para o campeonato.',
                'data_hora_inicio' => Carbon::create(2025, 12, 1, 15, 0, 0),
                'data_hora_fim' => Carbon::create(2025, 12, 1, 17, 0, 0),
                'local' => 'Estádio Municipal',
                'equipa_id' => 1,
                'adversario' => 'Benfica',
                'realizado' => true,
                'estado' => 'Concluído',
                'golosEquipa' => 3,
                'golosAdversario' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tipo_evento' => 1, // Jogo
                'titulo' => 'Jogo Amigável',
                'descricao' => 'Jogo de preparação contra equipa júnior.',
                'data_hora_inicio' => Carbon::create(2025, 12, 10, 10, 0, 0),
                'data_hora_fim' => Carbon::create(2025, 12, 10, 11, 30, 0),
                'local' => 'Campo de Treinos',
                'equipa_id' => 1,
                'adversario' => 'Equipa Júnior A',
                'realizado' => true,
                'estado' => 'Concluído',
                'golosEquipa' => 5,
                'golosAdversario' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tipo_evento' => 1, // Jogo
                'titulo' => 'Jogo da Taça Distrital',
                'descricao' => 'Primeira ronda da taça.',
                'data_hora_inicio' => Carbon::create(2025, 12, 15, 19, 0, 0),
                'data_hora_fim' => Carbon::create(2025, 12, 15, 21, 0, 0),
                'local' => 'Campo B',
                'equipa_id' => 1,
                'adversario' => 'Sporting',
                'realizado' => false,
                'estado' => 'Agendado',
                'golosEquipa' => null,
                'golosAdversario' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tipo_evento' => 1, // Jogo
                'titulo' => 'Jogo de Campeonato',
                'descricao' => 'Jogo importante para as classificações.',
                'data_hora_inicio' => Carbon::create(2026, 1, 5, 14, 0, 0),
                'data_hora_fim' => Carbon::create(2026, 1, 5, 16, 0, 0),
                'local' => 'Estádio do Porto',
                'equipa_id' => 1,
                'adversario' => 'Futebol Clube do Porto',
                'realizado' => false,
                'estado' => 'Agendado',
                'golosEquipa' => null,
                'golosAdversario' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Treinos
            [
                'tipo_evento' => 2, // Treino
                'titulo' => 'Treino Tático',
                'descricao' => 'Foco na defesa e transições rápidas.',
                'data_hora_inicio' => Carbon::create(2025, 11, 27, 9, 0, 0),
                'data_hora_fim' => Carbon::create(2025, 11, 27, 11, 0, 0),
                'local' => 'Campo de Treinos',
                'equipa_id' => 1,
                'adversario' => null,
                'realizado' => true,
                'estado' => 'Concluído',
                'golosEquipa' => null,
                'golosAdversario' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tipo_evento' => 2, // Treino
                'titulo' => 'Treino Físico',
                'descricao' => 'Treino de resistência e velocidade.',
                'data_hora_inicio' => Carbon::create(2025, 11, 28, 16, 0, 0),
                'data_hora_fim' => Carbon::create(2025, 11, 28, 17, 30, 0),
                'local' => 'Ginásio do Clube',
                'equipa_id' => 1,
                'adversario' => null,
                'realizado' => true,
                'estado' => 'Concluído',
                'golosEquipa' => null,
                'golosAdversario' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Outros Eventos
            [
                'tipo_evento' => 3, // Outros Eventos
                'titulo' => 'Reunião de Equipa',
                'descricao' => 'Discussão das metas para a próxima época.',
                'data_hora_inicio' => Carbon::create(2025, 12, 5, 18, 0, 0),
                'data_hora_fim' => Carbon::create(2025, 12, 5, 19, 0, 0),
                'local' => 'Sala de Reuniões',
                'equipa_id' => 1,
                'adversario' => null,
                'realizado' => false,
                'estado' => 'Agendado',
                'golosEquipa' => null,
                'golosAdversario' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}