<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipa extends Model
{
    protected $table = 'equipas';

    protected $fillable = [
        'nome',
        'modalidade',
        'categoria',
        'ano_fundacao',
        'logo_url',
        'local_treino',
        'user_id',
        'descricao',
        'clube_id'
    ];



}
