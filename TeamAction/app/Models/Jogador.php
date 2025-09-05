<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Jogador extends Model
{
    use HasFactory;

    /**
     * O nome da tabela associada a este modelo.
     * @var string
     */
    protected $table = 'jogadores';

    /**
     * Os atributos que podem ser atribuídos em massa.
     * @var array
     */
    protected $fillable = [
        'nome',
        'data_nascimento',
        'posicao',
        'numero_camisola',
        'contacto',
        'morada',
        'ativo',
    ];

    /**
     * Define a relação de muitos-para-muitos com o modelo Equipa.
     * Um jogador pode pertencer a várias equipas.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function equipas(): BelongsToMany
    {
        return $this->belongsToMany(Equipa::class, 'jogador_equipa');
    }
}
