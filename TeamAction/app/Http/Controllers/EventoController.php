<?php

namespace App\Http\Controllers;
use App\Models\Evento;
use App\Models\Equipa;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        // Obtém todos os eventos da tabela 'eventos'.
        // O método 'all()' é simples, mas para bases de dados maiores
        // pode ser otimizado com paginação.
        $eventos = Evento::all();

        // Retorna a coleção de eventos como uma resposta JSON.
        return response()->json($eventos);
    }

   
    // A consulta está quase perfeita, apenas alteramos 'true' para true.
    public function getJogos($isDone)
    {
        $today = Carbon::now();

        $jogosQuery = DB::table('eventos')
            ->join('equipas', 'eventos.equipa_id', '=', 'equipas.id')
            ->where('eventos.tipo_evento', 1) // Tipo de evento para "Jogo"
            ->select(
                'eventos.*',
                'eventos.adversario',
                'equipas.nome as nome_equipa',
                'equipas.local_jogo as local_jogo_equipa'
            );
        
        // Se isDone for 'true', retorna jogos que já aconteceram.
        // Se isDone for 'false', retorna jogos que ainda vão acontecer.
        if ($isDone == 'true') {
            $jogosQuery->where('eventos.data_hora_fim', '<', $today);
        } else {
            $jogosQuery->where('eventos.data_hora_fim', '>=', $today);
        }

        $jogos = $jogosQuery->get();
        
        // Adiciona o novo atributo 'tipo_local' a cada jogo na coleção
        $jogos = $jogos->map(function ($jogo) {
            $jogo->tipo_local = ($jogo->local == $jogo->local_jogo_equipa) ? 'Em Casa' : 'Fora';
            return $jogo;
        });

        return response()->json($jogos);
    }

}


