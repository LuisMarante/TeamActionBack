<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clube;

class ClubeController extends Controller
{
    /**
     * Obtém todos os dados de um clube, incluindo as suas equipas e os respetivos jogadores.
     *
     * @param  int  $clubeId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getClubeComDetalhes($clubeId)
    {
        // Encontra o clube e carrega as relações "equipas" e, dentro de cada equipa, a relação "jogadores".
        $clube = Clube::with(['equipas.jogadores'])->find($clubeId);

        // Verifica se o clube foi encontrado.
        if (!$clube) {
            return response()->json(['mensagem' => 'Clube não encontrado.'], 404);
        }

        // Retorna o clube com todos os dados relacionados em formato JSON.
        return response()->json($clube);
    }
}
