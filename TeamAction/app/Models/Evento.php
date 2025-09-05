<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    /**
     * O nome da tabela associada a este modelo.
     * Por convenção, o Laravel infere o nome no plural, mas é uma boa prática
     * especificá-lo para evitar erros.
     * @var string
     */
    protected $table = 'eventos';

    /**
     * Os atributos que podem ser atribuídos em massa.
     * @var array<int, string>
     */
    protected $fillable = [
        'tipo_evento',
        'titulo',
        'descricao',
        'data',
        'data_hora_inicio',
        'hora_inicio',
        'hora_fim',
        'duracao',
        'local',
        'equipa_id',
        'adversario',
        'visibilidade',
        'realizado',
        'golosEquipa',
        'golosAdversario',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     * @var array
     */
    protected $casts = [
        'data' => 'date',
        'data_hora_inicio' => 'datetime',
        'hora_inicio' => 'time',
        'hora_fim' => 'time',
    ];
}

