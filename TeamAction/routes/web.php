<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;




Route::get('/eventos', [EventoController::class, 'index']);





Route::get('/jogosPassados', [EventoController::class, 'getJogosPassados']);

Route::get('/jogosFuturos', [EventoController::class, 'getJogosFuturos']);


Route::get('/eventos/{eventoId}/estatisticas', [EventoController::class, 'getEstatisticasJogo']);

Route::post('/eventos/{eventoId}/estatisticas', [EventoController::class, 'storeEstatisticasJogo']);
