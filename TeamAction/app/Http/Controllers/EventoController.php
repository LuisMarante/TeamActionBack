<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Evento;

class EventoController extends Controller
{
    /**
     * Obtém uma lista de jogos com base nos parâmetros de pesquisa.
     * Esta função é dinâmica e pode filtrar por múltiplos atributos.
     *
     * @param \Illuminate\Http\Request $request O pedido HTTP.
     * @return \Illuminate\Http\JsonResponse
     */


 // função que permite o fron-end obter dados que precisa
    public function getJogosPassados(Request $request)
    {
        $query = Evento::with('equipa')
            ->where('tipo_evento', 1)
            ->where('data_hora_fim', '<', Carbon::now());


            // este código é para tratar um query parameter
        if ($request->has('equipa_id')) {

            // Obtém os IDs do parâmetro de consulta, dividindo a string por vírgulas
            $equipaIds = explode(',', $request->input('equipa_id'));

            // Filtra os eventos onde o 'equipa_id' está na lista de IDs fornecidos
            $query->whereIn('equipa_id', $equipaIds);
        }

        $query->orderBy('data_hora_inicio', 'desc');

        if ($request->has('limit') && is_numeric($request->input('limit'))) {
            $query->take((int)$request->input('limit'));
        }

        $eventos = $query->get();

        // Mapear os dados para o formato JSON desejado
        $eventosFormatados = $eventos->map(function ($evento) {
            // Formatar o ID para 'evt_123'


            // Obter o nome da equipa, verificando se a relação existe
            $nomeEquipa = $evento->equipa ? $evento->equipa->nome : null;

            // Formatar a data e hora de início para o padrão ISO 8601
            $dataHoraInicioFormatada = $evento->data_hora_inicio->toIso8601String();

            // Construir o objeto de evento com as chaves de nome desejadas
            return [
                'id' => $evento->id,
                'team_name' => $nomeEquipa,
                'opponent_name' => $evento->adversario,
                'start_datetime' => $dataHoraInicioFormatada,
                'team_score' => $evento->golosEquipa,
                'opponent_score' => $evento->golosAdversario,
            ];
        });

        // Retornar a resposta JSON
        return response()->json([
            'events' => $eventosFormatados
        ]);


    }


    // função que permite o fron-end obter dados que precisa
    public function getJogosFuturos(Request $request)
    {
        $query = Evento::with('equipa')
            ->where('tipo_evento', 1)
            ->where('data_hora_fim', '>', Carbon::now());


            // este código é para tratar um query parameter
        if ($request->has('equipa_id')) {

            // Obtém os IDs do parâmetro de consulta, dividindo a string por vírgulas
            $equipaIds = explode(',', $request->input('equipa_id'));

            // Filtra os eventos onde o 'equipa_id' está na lista de IDs fornecidos
            $query->whereIn('equipa_id', $equipaIds);
        }

        $query->orderBy('data_hora_inicio', 'desc');

        if ($request->has('limit') && is_numeric($request->input('limit'))) {
            $query->take((int)$request->input('limit'));
        }

        $eventos = $query->get();

        // Mapear os dados para o formato JSON desejado
        $eventosFormatados = $eventos->map(function ($evento) {
            // Formatar o ID para 'evt_123'


            // Obter o nome da equipa, verificando se a relação existe
            $nomeEquipa = $evento->equipa ? $evento->equipa->nome : null;

            // Formatar a data e hora de início para o padrão ISO 8601
            $dataHoraInicioFormatada = $evento->data_hora_inicio->toIso8601String();

            // Construir o objeto de evento com as chaves de nome desejadas
            return [
                'id' => $evento->id,
                'team_name' => $nomeEquipa,
                'opponent_name' => $evento->adversario,
                'start_datetime' => $dataHoraInicioFormatada,
                'team_score' => $evento->golosEquipa,
                'opponent_score' => $evento->golosAdversario,
            ];
        });

        // Retornar a resposta JSON
        return response()->json([
            'events' => $eventosFormatados
        ]);

    }

// Função que permite o front-end obter os dados que precisa
    public function getEstatisticasJogo($eventoId)
    {
        // 1. Buscar o evento com as relações necessárias
        $evento = Evento::with(['equipa', 'adversario', 'creator'])
            ->find($eventoId);

        if (!$evento) {
            return response()->json([
                'success' => false,
                'message' => 'Evento não encontrado'
            ], 404);
        }

        // 2. Verificar se o jogo tem estatísticas (já foi finalizado)
        if (!$evento->realizado) {
            return response()->json([
                'success' => false,
                'message' => 'Este jogo ainda não foi finalizado'
            ], 400);
        }

        // 3. Buscar estatísticas dos jogadores com informações do jogador
        $estatisticasJogadores = DB::table('estatistica_jogadores')
            ->join('jogadores', 'jogadores.id', '=', 'estatistica_jogadores.jogador_id')
            ->where('estatistica_jogadores.jogo_id', $eventoId) // Lembrar de mudar para evento_id
            ->select(
                'jogadores.id as jogador_id',
                'jogadores.nome as jogador_nome',
                'jogadores.numero_camisola',
                'jogadores.posicao',
                'estatistica_jogadores.*'
            )
            ->get();

        // 4. Buscar estatísticas da equipa
        $estatisticasEquipa = DB::table('estatistica_equipas')
            ->where('jogo_id', $eventoId) // Lembrar de mudar para evento_id
            ->where('equipa_id', $evento->equipa_id)
            ->first();

        // 5. Formatar resposta completa
        return response()->json([
            'success' => true,
            'data' => [
                'evento' => [
                    'id' => $evento->id,
                    'titulo' => $evento->titulo,
                    'data_hora_inicio' => $evento->data_hora_inicio,
                    'local' => $evento->local,
                    'estado' => $evento->estado,
                    'golos_equipa' => $evento->golosEquipa,
                    'golos_adversario' => $evento->golosAdversario,
                ],
                'equipa' => [
                    'id' => $evento->equipa->id,
                    'nome' => $evento->equipa->nome,
                    'logo_url' => $evento->equipa->logo_url,
                ],
                'adversario' => $evento->adversario ? [
                    'id' => $evento->adversario->id,
                    'nome' => $evento->adversario->nome,
                    'logo_url' => $evento->adversario->logo_url,
                ] : null,
                'estatisticas_jogadores' => $estatisticasJogadores,
                'estatisticas_equipa' => $estatisticasEquipa,
            ]
        ], 200);
    }



// função que guarda na base de dados (estatistica_jogadores e estatistica_equipas) informação sobre um jogo específico
    public function storeEstatisticasJogo(Request $request, $eventoId)
    {

        $evento = Evento::find($eventoId);

        if (!$evento) {
            return response()->json([
                'success' => false,
                'message' => 'Evento não encontrado'
            ], 404);
        }

        // 2. Verificar se o evento já foi finalizado
        if ($evento->realizado) {
            return response()->json([
                'success' => false,
                'message' => 'Este evento já foi finalizado'
            ], 400);
        }

        // 3. Verificar se é um jogo (tipo_evento = 1)
        if ($evento->tipo_evento !== 1) {
            return response()->json([
                'success' => false,
                'message' => 'Este evento não é um jogo'
            ], 400);
        }

        $validated = $request->validate([
            'golos_equipa' => 'required|integer|min:0',
            'golos_adversario' => 'required|integer|min:0',
            'posse_bola_percentagem' => 'required|integer|min:0|max:100',

            'estatisticas_jogadores' => 'required|array',
    'estatisticas_jogadores.*.jogador_id' => 'required|exists:jogadores,id',
    'estatisticas_jogadores.*.minutos_jogados' => 'required|integer|min:0|max:120',
    'estatisticas_jogadores.*.remates_tentados' => 'required|integer|min:0',
    'estatisticas_jogadores.*.remates_convertidos' => 'required|integer|min:0',
    'estatisticas_jogadores.*.passes_tentados' => 'required|integer|min:0',
    'estatisticas_jogadores.*.passes_completados' => 'required|integer|min:0',
    'estatisticas_jogadores.*.perdas_bola' => 'required|integer|min:0',
    'estatisticas_jogadores.*.recuperacoes_bola' => 'required|integer|min:0',
    'estatisticas_jogadores.*.defesas' => 'required|integer|min:0',
    'estatisticas_jogadores.*.faltas_cometidas' => 'required|integer|min:0',
    'estatisticas_jogadores.*.faltas_sofridas' => 'required|integer|min:0',
    'estatisticas_jogadores.*.cartaoAmarelo' => 'required|integer|min:0|max:2',
    'estatisticas_jogadores.*.cartaoVermelho' => 'required|integer|min:0|max:1',
    'estatisticas_jogadores.*.cartaoAzul' => 'required|integer|min:0|max:1',
    'estatisticas_jogadores.*.golos_marcados' => 'required|integer|min:0',
    'estatisticas_jogadores.*.golos_sofridos' => 'required|integer|min:0',
    'estatisticas_jogadores.*.dribles_tentados' => 'required|integer|min:0',
    'estatisticas_jogadores.*.dribles_completados' => 'required|integer|min:0',
        ]);

// 7. Inserir estatísticas de cada jogador
foreach ($validated['estatisticas_jogadores'] as $estatisticaJogador) {
    DB::table('estatistica_jogadores')->insert([
        'jogador_id' => $estatisticaJogador['jogador_id'],
        'eventos_id' => $eventoId,
        'equipa_id' => $evento->equipa_id,
        'remates_tentados' => $estatisticaJogador['remates_tentados'],
        'remates_convertidos' => $estatisticaJogador['remates_convertidos'],
        'passes_tentados' => $estatisticaJogador['passes_tentados'],
        'passes_completados' => $estatisticaJogador['passes_completados'],
        'perdas_bola' => $estatisticaJogador['perdas_bola'],
        'recuperacoes_bola' => $estatisticaJogador['recuperacoes_bola'],
        'defesas' => $estatisticaJogador['defesas'],
        'faltas_cometidas' => $estatisticaJogador['faltas_cometidas'],
        'faltas_sofridas' => $estatisticaJogador['faltas_sofridas'],
        'minutos_jogados' => $estatisticaJogador['minutos_jogados'],
        'cartaoAmarelo' => $estatisticaJogador['cartaoAmarelo'],
        'cartaoVermelho' => $estatisticaJogador['cartaoVermelho'],
        'cartaoAzul' => $estatisticaJogador['cartaoAzul'],
        'golos_marcados' => $estatisticaJogador['golos_marcados'],
        'golos_sofridos' => $estatisticaJogador['golos_sofridos'],
        'dribles_tentados' => $estatisticaJogador['dribles_tentados'],
        'dribles_completados' => $estatisticaJogador['dribles_completados'],
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}


// 8. Calcular estatísticas agregadas da equipa a partir dos jogadores
$estatisticasJogadoresCollection = collect($validated['estatisticas_jogadores']);

$estatisticasEquipa = [
    'equipa_id' => $evento->equipa_id,
    'jogo_id' => $eventoId,  // Lembrar de mudar para evento_id depois
    'posse_bola_percentagem' => $validated['posse_bola_percentagem'],
    'remates_totais' => $estatisticasJogadoresCollection->sum('remates_tentados'),
    'remates_baliza' => $estatisticasJogadoresCollection->sum('remates_convertidos'),
    'passes_totais' => $estatisticasJogadoresCollection->sum('passes_tentados'),
    'passes_completados' => $estatisticasJogadoresCollection->sum('passes_completados'),
    'perdas_bola_totais' => $estatisticasJogadoresCollection->sum('perdas_bola'),
    'faltas_totais' => $estatisticasJogadoresCollection->sum('faltas_cometidas'),
    'golos_marcados' => $validated['golos_equipa'],
    'golos_sofridos' => $validated['golos_adversario'],
    'pontos' => $this->calcularPontos($validated['golos_equipa'], $validated['golos_adversario']),
    'created_at' => now(),
    'updated_at' => now(),
];

DB::table('estatistica_equipas')->insert($estatisticasEquipa);

// 10. Confirmar a transação
DB::commit();

// 11. Retornar resposta de sucesso
// 11. Retornar resposta com todos os dados
return response()->json([
    'success' => true,
    'message' => 'Estatísticas do jogo guardadas com sucesso',
    'data' => [
        'evento' => [
            'id' => $eventoId,
            'golos_equipa' => $validated['golos_equipa'],
            'golos_adversario' => $validated['golos_adversario'],
            'estado' => 'Concluído'
        ],
        'estatisticas_equipa' => $estatisticasEquipa,
        'estatisticas_jogadores' => $validated['estatisticas_jogadores'],
        'resumo' => [
            'resultado' => $validated['golos_equipa'] . ' - ' . $validated['golos_adversario'],
            'pontos_ganhos' => $estatisticasEquipa['pontos'],
            'total_jogadores' => count($validated['estatisticas_jogadores'])
        ]
    ]
], 200);




    }

// 9. Método auxiliar para calcular pontos de cada equipa (possivelmente será útil se projeto escalar)
private function calcularPontos($golosEquipa, $golosAdversario)
{
    if ($golosEquipa > $golosAdversario) {
        return 3; // Vitória
    } elseif ($golosEquipa == $golosAdversario) {
        return 1; // Empate
    } else {
        return 0; // Derrota
    }
}


}


