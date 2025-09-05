<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AnaliseEvento extends Model
{
    use HasFactory;

    /**
     * O nome da tabela associada a este modelo.
     * @var string
     */
    protected $table = 'analise_eventos';

    /**
     * Os atributos que podem ser atribuídos em massa.
     * @var array
     */
    protected $fillable = [
        'evento_id',
        'equipa_id',
        'observacoes_analiticas',
        'conclusoes',
        'ficheiro_analise_url',
    ];

    /**
     * Define a relação com o modelo Evento.
     * Uma análise de evento pertence a um evento.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function evento(): BelongsTo
    {
        return $this->belongsTo(Evento::class);
    }

    /**
     * Define a relação com o modelo Equipa.
     * Uma análise de evento pertence a uma equipa.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function equipa(): BelongsTo
    {
        return $this->belongsTo(Equipa::class);
    }
}
