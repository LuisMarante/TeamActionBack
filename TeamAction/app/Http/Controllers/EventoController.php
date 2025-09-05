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
    public function getJogosPassados(Request $request)
    {
        $jogos = DB::table('eventos')
            ->join('equipas', 'eventos.equipa_id', '=', 'equipas.id')
            ->where('eventos.tipo_evento', 1) // Tipo de evento para "Jogo"
            ->where('eventos.realizado', true) // Só jogos marcados como realizados
            ->select(
                'eventos.*',
                'equipas.nome as nome_equipa',
                'equipas.local_jogo as local_jogo_equipa'
            )
            ->get();

        // Adiciona o novo atributo 'tipo_local' a cada jogo na coleção
        $jogos = $jogos->map(function ($jogo) {
            $jogo->tipo_local = ($jogo->local == $jogo->local_jogo_equipa) ? 'Em Casa' : 'Fora';
            return $jogo;
        });

        dd($jogos);
        return response()->json($jogos);
    }
}


