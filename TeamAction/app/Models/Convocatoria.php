<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Convocatoria extends Model
{
    use HasFactory;

    /**
     * O nome da tabela associada a este modelo.
     * @var string
     */
    protected $table = 'convocatorias';

    /**
     * Os atributos que podem ser atribuídos em massa.
     * @var array
     */
    protected $fillable = [
        'equipa_id',
        'evento_id',
        'data_hora_limite',
        'estado_convocatoria',
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
     * Define a relação com o modelo Evento.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function evento(): BelongsTo
    {
        return $this->belongsTo(Evento::class);
    }
}

