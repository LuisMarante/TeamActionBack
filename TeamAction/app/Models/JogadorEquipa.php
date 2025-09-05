<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JogadorEquipa extends Model
{
    use HasFactory;

    /**
     * O nome da tabela de junção associada a este modelo.
     * @var string
     */
    protected $table = 'jogador_equipa';

    /**
     * Os atributos que podem ser atribuídos em massa.
     * @var array
     */
    protected $fillable = [
        'jogador_id',
        'equipa_id',
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
     * Define a relação com o modelo Equipa.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function equipa(): BelongsTo
    {
        return $this->belongsTo(Equipa::class);
    }
}
