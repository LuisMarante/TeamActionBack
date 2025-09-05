<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstatisticaJogadorController extends Controller
{
    /**
     * Obtém todas as estatísticas de um jogador, filtradas por ID.
     *
     * @param  int  $jogadorId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEstatisticasPorJogador($jogadorId)
    {
        $estatisticasJogador = DB::table('estatistica_jogadores')
                          ->where('jogador_id', $jogadorId)
                          ->get();

        if ($estatisticas->isEmpty()) {
            return response()->json(['mensagem' => 'Estatísticas de jogador não encontradas.'], 404);
        }

        return response()->json($estatisticasJogador);
    }
}
