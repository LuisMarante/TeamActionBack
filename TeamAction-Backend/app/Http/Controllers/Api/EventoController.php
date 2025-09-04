<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evento;

class EventoController extends Controller
{
    /**
     * Buscar jogos passados (realizados)
     */
    public function getJogosPassados(Request $request)
    {
        $jogos = Evento::where('tipo_evento', Evento::TIPO_JOGO)
                       ->where('realizado', 'true')  // Só jogos marcados como realizados
                       ->get();

                       dd($jogos);
        
        return response()->json($jogos);
    }

    /**
     * Marcar um evento como realizado
     */
    public function marcarComoRealizado($id)
    {
        // Buscar o evento pelo ID
        $evento = Evento::find($id);
        
        // Verificar se existe
        if (!$evento) {
            return response()->json(['error' => 'Evento não encontrado'], 404);
        }
        
        // Marcar como realizado
        $evento->realizado = 'true';
        $evento->save();
        
        return response()->json([
            'message' => 'Evento marcado como realizado',
            'evento' => $evento
        ]);
    }
}