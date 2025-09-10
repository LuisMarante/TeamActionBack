<?php

namespace App\Http\Controllers;

use App\Models\Epoca; // Importa o modelo Epoca
use Illuminate\Http\Request;

class EpocaController extends Controller
{
    /**
     * Guarda um novo registo de época na base de dados.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeEpoca(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            // Validar o campo 'nome', que a sua base de dados usa para guardar o ano
            'nome' => 'required|string|max:255|unique:epocas,nome',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
            // Validação corrigida para a 'descricao' (agora como string)
            'descricao' => 'required|string|max:255',
        ]);

        // Cria uma nova instância do modelo Epoca
        $epoca = new Epoca();

        // Atribui os valores recebidos do formulário
        // A chave no 'input' deve corresponder ao nome do campo na base de dados
        $epoca->nome = $request->input('nome');
        $epoca->data_inicio = $request->input('data_inicio');
        $epoca->data_fim = $request->input('data_fim');
        $epoca->descricao = $request->input('descricao');

        // Guarda a nova época na base de dados
        $epoca->save();

        // Resposta de sucesso
        return response()->json(['mensagem' => 'Época criada com sucesso!', 'epoca' => $epoca], 201);
    }
}
