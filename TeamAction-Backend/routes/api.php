<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventoController;  // ✅ Com "Api"



// ROTA DE TESTE - Adiciona esta
Route::get('/test', function () {
    return response()->json(['message' => 'API funciona!']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/games/past', [EventoController::class, 'getJogosPassados']);
Route::put('/eventos/{id}/realizar', [EventoController::class, 'marcarComoRealizado']);

Route::get('student', function(){
    return 'i am a student';
});