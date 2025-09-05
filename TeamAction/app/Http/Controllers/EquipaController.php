<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipa;

class EquipaController extends Controller
{
    /**
     * Obtém todas as equipas de uma época específica, usando a ligação através do clube.
     *
     * @param  int  $epocaId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEquipasPorEpoca($epocaId)
    {
        $equipas = Equipa::join('clubes', 'equipas.clube_id', '=', 'clubes.id')
                        ->join('epocas', 'clubes.epoca_id', '=', 'epocas.id')
                        ->where('epocas.id', $epocaId)
                        ->select('equipas.*')
                        ->get();

        if ($equipas->isEmpty()) {
            return response()->json(['mensagem' => 'Equipas não encontradas para esta época.'], 404);
        }

        return response()->json($equipas);
    }
}