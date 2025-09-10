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

    public function storeClube(Request $request)
    {
        // Validation of the form data, now using 'epoca_nome'
        $request->validate([
            'epoca_nome' => 'required|string|max:255|exists:epocas,nome',
            'nome' => 'required|string|max:255|unique:clubes,nome',
            'logo_url' => 'required|url',
            'contacto' => 'required|string|max:255',
        ]);

        // Find the 'epoca_id' based on the provided name
        $epoca = Epoca::where('nome', $request->input('epoca_nome'))->first();

        // If the season is not found (this should be caught by the validation, but it's a good safety check)
        if (!$epoca) {
            return response()->json(['mensagem' => 'A época fornecida não existe.'], 404);
        }

        // Create a new Clube model instance
        $clube = new Clube();

        // Assign the values received from the form
        $clube->epoca_id = $epoca->id; // Use the found ID
        $clube->nome = $request->input('nome');
        $clube->logo_url = $request->input('logo_url');
        $clube->contacto = $request->input('contacto');

        // Save the new club to the database
        $clube->save();

        // Success response
        return response()->json(['mensagem' => 'Clube criado com sucesso!', 'clube' => $clube], 201);
    }

}
