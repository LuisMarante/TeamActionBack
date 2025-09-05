<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Observacao extends Model
{
    use HasFactory;

    /**
     * O nome da tabela associada a este modelo.
     * @var string
     */
    protected $table = 'observacoes';

    /**
     * Os atributos que podem ser atribuídos em massa.
     * @var array
     */
    protected $fillable = [
        'user_id',
        'jogador_id',
        'data_hora',
        'descricao',
    ];

    /**
     * Define a relação com o modelo User.
     * Uma observação pertence a um utilizador.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define a relação com o modelo Jogador.
     * Uma observação pertence a um jogador.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jogador(): BelongsTo
    {
        return $this->belongsTo(Jogador::class);
    }
}
