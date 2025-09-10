<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Equipa extends Model
{
    use HasFactory;

    /**
     * O nome da tabela associada a este modelo.
     * @var string
     */
    protected $table = 'equipas';

    /**
     * Os atributos que podem ser atribuídos em massa.
     * @var array
     */
    protected $fillable = [
        'nome',
        'descricao',
        'modalidade',
        'genero',
        'clube_id',
        'created_by',
    ];

    /**
     * Define a relação com o modelo Clube.
     * Uma equipa pertence a um clube.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clube(): BelongsTo
    {
        return $this->belongsTo(Clube::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relação com o treinador (se tiveres)
    public function treinador()
    {
        return $this->belongsTo(User::class, 'treinador_id');
    }

    // Relação com eventos
    public function evento()
    {
        return $this->hasMany(Evento::class);
    }

    // Relação com eventos como adversário
    public function eventosComoAdversario()
    {
        return $this->hasMany(Evento::class, 'adversario_id');
    }
}

