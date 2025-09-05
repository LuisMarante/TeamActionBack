<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EstatisticaJogador extends Model
{
    use HasFactory;

    /**
     * O nome da tabela associada a este modelo.
     * @var string
     */
    protected $table = 'estatistica_jogadores';

    /**
     * Os atributos que podem ser atribuídos em massa.
     * @var array
     */
    protected $fillable = [
        'jogador_id',
        'jogo_id',
        'equipa_id',
        'remates_tentados',
        'remates_convertidos',
        'passes_tentados',
        'passes_completados',
        'perdas_bola',
        'recuperacoes_bola',
        'faltas_cometidas',
        'faltas_sofridas',
        'minutos_jogados',
        'cartaoAmarelo',
        'cartaoVermelho',
        'cartaoAzul',
        'golos_marcados',
        'golos_sofridos',
        'dribles_tentados',
        'dribles_completados',
    ];

    /**
     * Define a relação com o modelo Jogador.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jogador(): BelongsTo
    {
        return $this->belongsTo(Jogador::class);
    }

    /**
     * Define a relação com o modelo Evento (jogo).
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jogo(): BelongsTo
    {
        return $this->belongsTo(Evento::class, 'jogo_id');
    }

    /**
     * Define a relação com o modelo Equipa.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function equipa(): BelongsTo
    {
        return $this->belongsTo(Equipa::class);
    }
}
