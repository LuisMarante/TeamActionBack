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
                'adversario_id' => 3, // Equipa Vencedora
                'realizado' => true,
                'estado' => 'Concluído',
                'golosEquipa' => 3,
                'golosAdversario' => 1,
                'created_by' => 1,
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
                'adversario_id' => 4, // Águias Douradas
                'realizado' => true,
                'estado' => 'Concluído',
                'golosEquipa' => 5,
                'golosAdversario' => 0,
                'created_by' => 1,
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
                'adversario_id' => 5, // Leões do Norte
                'realizado' => false,
                'estado' => 'Agendado',
                'golosEquipa' => null,
                'golosAdversario' => null,
                'created_by' => 1,
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
                'adversario_id' => 7, // Panteras Negras
                'realizado' => false,
                'estado' => 'Agendado',
                'golosEquipa' => null,
                'golosAdversario' => null,
                'created_by' => 1,
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
                'adversario_id' => null,
                'realizado' => true,
                'estado' => 'Concluído',
                'golosEquipa' => null,
                'golosAdversario' => null,
                'created_by' => 1,
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
                'adversario_id' => null,
                'realizado' => true,
                'estado' => 'Concluído',
                'golosEquipa' => null,
                'golosAdversario' => null,
                'created_by' => 1,
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
                'adversario_id' => null,
                'realizado' => false,
                'estado' => 'Agendado',
                'golosEquipa' => null,
                'golosAdversario' => null,
                'created_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Mais eventos adicionados
            [
                'tipo_evento' => 1, // Jogo
                'titulo' => 'Dérbi Regional',
                'descricao' => 'Clássico entre rivais históricos.',
                'data_hora_inicio' => Carbon::create(2025, 12, 20, 20, 30, 0),
                'data_hora_fim' => Carbon::create(2025, 12, 20, 22, 30, 0),
                'local' => 'Estádio Municipal',
                'equipa_id' => 6, // Tigres Brancos
                'adversario_id' => 8, // Falcões Azuis
                'realizado' => false,
                'estado' => 'Agendado',
                'golosEquipa' => null,
                'golosAdversario' => null,
                'created_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tipo_evento' => 1, // Jogo
                'titulo' => 'Basquetebol - Liga Regional',
                'descricao' => 'Jogo da 5ª jornada.',
                'data_hora_inicio' => Carbon::create(2025, 11, 30, 18, 0, 0),
                'data_hora_fim' => Carbon::create(2025, 11, 30, 20, 0, 0),
                'local' => 'Pavilhão Principal',
                'equipa_id' => 2, // Basquetebolistas da Praia
                'adversario_id' => 7, // Panteras Negras
                'realizado' => true,
                'estado' => 'Concluído',
                'golosEquipa' => 78,
                'golosAdversario' => 82,
                'created_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tipo_evento' => 2, // Treino
                'titulo' => 'Treino de Preparação Física',
                'descricao' => 'Preparação para o próximo jogo.',
                'data_hora_inicio' => Carbon::create(2025, 12, 3, 10, 0, 0),
                'data_hora_fim' => Carbon::create(2025, 12, 3, 12, 0, 0),
                'local' => 'Campo Auxiliar',
                'equipa_id' => 4, // Águias Douradas
                'adversario_id' => null,
                'realizado' => true,
                'estado' => 'Concluído',
                'golosEquipa' => null,
                'golosAdversario' => null,
                'created_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tipo_evento' => 1, // Jogo
                'titulo' => 'Voleibol Feminino - Semifinal',
                'descricao' => 'Semifinal do campeonato regional.',
                'data_hora_inicio' => Carbon::create(2025, 12, 22, 16, 0, 0),
                'data_hora_fim' => Carbon::create(2025, 12, 22, 18, 0, 0),
                'local' => 'Pavilhão do Clube',
                'equipa_id' => 3, // Equipa Vencedora
                'adversario_id' => 9, // Guerreiras do Sul
                'realizado' => false,
                'estado' => 'Agendado',
                'golosEquipa' => null,
                'golosAdversario' => null,
                'created_by' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tipo_evento' => 3, // Outros Eventos
                'titulo' => 'Jantar de Natal',
                'descricao' => 'Confraternização de final de ano.',
                'data_hora_inicio' => Carbon::create(2025, 12, 18, 20, 0, 0),
                'data_hora_fim' => Carbon::create(2025, 12, 18, 23, 0, 0),
                'local' => 'Restaurante do Clube',
                'equipa_id' => 1,
                'adversario_id' => null,
                'realizado' => false,
                'estado' => 'Agendado',
                'golosEquipa' => null,
                'golosAdversario' => null,
                'created_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tipo_evento' => 2, // Treino
                'titulo' => 'Treino Técnico',
                'descricao' => 'Aperfeiçoamento de jogadas ensaiadas.',
                'data_hora_inicio' => Carbon::create(2025, 12, 2, 15, 0, 0),
                'data_hora_fim' => Carbon::create(2025, 12, 2, 17, 0, 0),
                'local' => 'Campo de Treinos B',
                'equipa_id' => 5, // Leões do Norte
                'adversario_id' => null,
                'realizado' => true,
                'estado' => 'Concluído',
                'golosEquipa' => null,
                'golosAdversario' => null,
                'created_by' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tipo_evento' => 1, // Jogo
                'titulo' => 'Torneio de Juvenis',
                'descricao' => 'Primeira fase do torneio regional.',
                'data_hora_inicio' => Carbon::create(2025, 12, 28, 11, 0, 0),
                'data_hora_fim' => Carbon::create(2025, 12, 28, 13, 0, 0),
                'local' => 'Campo Secundário',
                'equipa_id' => 11, // Dragões Vermelhos
                'adversario_id' => 5, // Leões do Norte
                'realizado' => false,
                'estado' => 'Agendado',
                'golosEquipa' => null,
                'golosAdversario' => null,
                'created_by' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tipo_evento' => 3, // Outros Eventos
                'titulo' => 'Apresentação da Equipa',
                'descricao' => 'Apresentação oficial aos sócios.',
                'data_hora_inicio' => Carbon::create(2025, 9, 1, 19, 0, 0),
                'data_hora_fim' => Carbon::create(2025, 9, 1, 21, 0, 0),
                'local' => 'Auditório Principal',
                'equipa_id' => 1,
                'adversario_id' => null,
                'realizado' => true,
                'estado' => 'Concluído',
                'golosEquipa' => null,
                'golosAdversario' => null,
                'created_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
