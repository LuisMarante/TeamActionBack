<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    
    use HasFactory;

    const TIPO_JOGO = 1;
    const TIPO_TORNEIO = 2;
    const TIPO_TREINO = 3;

    const TIPOS_NOMES = [
        self::TIPO_JOGO => 'Jogo',
        self::TIPO_TORNEIO => 'Torneio',
        self::TIPO_TREINO => 'Treino'
    ];



protected $table ='eventos';

protected $fillable = [
    'tipo_evento',
    'titulo',
    'descricao',
    'data',
    'hora_inicio',
    'hora_fim',
    'data_hora_inicio',  // NOVO
    'duracao',           // NOVO
    'local',
    'equipa_id',
    'adversario',
    'visibilidade',
    'realizado',
    'golosEquipa',
    'golosAdversario'
];

public function equipa() 
{
    return $this->belongsTo(Equipa::class, 'equipa_id');
}


public function getTipoNome()
{
    return self::TIPOS_NOMES[$this->tipo_evento] ?? 'Desconhecido';
}

}
