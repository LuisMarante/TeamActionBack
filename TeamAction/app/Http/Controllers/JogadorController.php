<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jogador;

class JogadorController extends Controller
{
    /**
     * Obtém os detalhes de um jogador específico.
     *
     * @param  int  $jogadorId
     * @return \Illuminate\Http\JsonResponse
     */
    public function getJogador($jogadorId)
    {
        $jogador = Jogador::find($jogadorId);

        if (!$jogador) {
            return response()->json(['mensagem' => 'Jogador não encontrado.'], 404);
        }

        return response()->json($jogador);
    }
}
