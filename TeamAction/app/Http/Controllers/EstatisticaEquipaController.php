<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstatisticaEquipaController extends Controller
{
    /**
     * Obtém todas as estatísticas de uma equipa, filtradas por ID.
     *
     * @param  int  $equipaId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEstatisticasPorEquipa($equipaId)
    {
        $estatisticas = DB::table('estatistica_equipas')
                          ->where('equipa_id', $equipaId)
                          ->get();

        if ($estatisticas->isEmpty()) {
            return response()->json(['mensagem' => 'Estatísticas de equipa não encontradas.'], 404);
        }

        return response()->json($estatisticas);
    }
}