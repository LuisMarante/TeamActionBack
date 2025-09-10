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

}


