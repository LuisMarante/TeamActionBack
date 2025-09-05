<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EstatisticaEquipa extends Model
{
    use HasFactory;

    /**
     * O nome da tabela associada a este modelo.
     * @var string
     */
    protected $table = 'estatistica_equipas';

    /**
     * Os atributos que podem ser atribuídos em massa.
     * @var array
     */
    protected $fillable = [
        'equipa_id',
        'jogo_id',
        'posse_bola_percentagem',
        'remates_totais',
        'remates_baliza',
        'passes_totais',
        'passes_completados',
        'perdas_bola_totais',
        'faltas_totais',
        'golos_marcados',
        'golos_sofridos',
    ];

    /**
     * Define a relação com o modelo Equipa.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function equipa(): BelongsTo
    {
        return $this->belongsTo(Equipa::class);
    }

    /**
     * Define a relação com o modelo Evento (jogo).
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jogo(): BelongsTo
    {
        return $this->belongsTo(Evento::class, 'jogo_id');
    }
}
