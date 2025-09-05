<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epoca extends Model
{
    use HasFactory;

    /**
     * O nome da tabela associada a este modelo.
     * @var string
     */
    protected $table = 'epocas';

    /**
     * Os atributos que podem ser atribuídos em massa.
     * @var array
     */
    protected $fillable = [
        'designacao',
        'data_inicio',
        'data_fim',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     * @var array
     */
    protected $casts = [
        'data_inicio' => 'date',
        'data_fim' => 'date',
    ];
}
