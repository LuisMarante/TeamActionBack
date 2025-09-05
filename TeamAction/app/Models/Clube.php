<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Clube extends Model
{
    use HasFactory;

    /**
     * O nome da tabela associada a este modelo.
     * @var string
     */
    protected $table = 'clubes';

    /**
     * Os atributos que podem ser atribuídos em massa.
     * @var array
     */
    protected $fillable = [
        'epoca_id',
        'nome',
        'cidade',
        'logo_url',
        'contacto',
    ];

    /**
     * Define a relação com o modelo Epoca.
     * Um clube pertence a uma época.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function epoca(): BelongsTo
    {
        return $this->belongsTo(Epoca::class);
    }
}

