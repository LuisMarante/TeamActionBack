<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ClubeController;
use App\Http\Controllers\EquipaController;
use App\Http\Controllers\EstatisticaEquipaController;
use App\Http\Controllers\EstatisticaJogadorController;
use App\Http\Controllers\JogadorController;



//////////////////////// EventoController ///////////////////////////

// Rota para obter todos os eventos
// Exemplo: GET /api/eventos
Route::get('/eventos', [EventoController::class, 'index']);

// Rota para obter jogos, filtrados por atributos
// Exemplo: GET /api/jogos/true (para jogos concluídos)
// Exemplo: GET /api/jogos/false (para jogos futuros)
Route::get('jogos', [EventoController::class, 'getJogos']);


Route::get('/jogosPassados', [EventoController::class, 'getJogosPassados']);


//////////////////////// JogadorController ///////////////////////////

// Rota para obter os detalhes de um jogador específico
// Exemplo: GET /api/jogador/1
Route::get('/jogador/{jogadorId}', [JogadorController::class, 'getJogador']);




//////////////////////// ClubeController ///////////////////////////


// Rota para obter todos os dados de um clube (incluindo equipas e jogadores)
// Exemplo: GET /api/clube-com-detalhes/1
Route::get('/clube-com-detalhes/{clubeId}', [ClubeController::class, 'getClubeComDetalhes']);



//////////////////////// EquipaController ///////////////////////////


// Rota para obter todas as equipas de uma época específica
// Exemplo: GET /api/equipas-por-epoca/1
Route::get('/equipas-por-epoca/{epocaId}', [EquipaController::class, 'getEquipasPorEpoca']);




//////////////////////// EstatisticaEquipaController ///////////////////////////

// Rota para obter todas as estatísticas de uma equipa, filtradas por ID
// Exemplo: GET /api/estatisticas-equipa/1
Route::get('/estatisticas-equipa/{equipaId}', [EstatisticaEquipaController::class, 'getEstatisticasPorEquipa']);




//////////////////////// EstatisticaJogadorController ///////////////////////////

// Rota para obter todas as estatísticas de um jogador, filtradas por ID
// Exemplo: GET /api/estatisticas-jogador/1
Route::get('/estatisticas-jogador/{jogadorId}', [EstatisticaJogadorController::class, 'getEstatisticasPorJogador']);
