<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'tipo_acesso',
        'data_nascimento',
        'genero',
        'telefone',
        'funcao',
        'foto_perfil_url',
    ];

    /**
     * Os atributos que devem ser escondidos para arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Define a relação com o modelo Tarefa.
     * Um utilizador pode ter muitas tarefas.
     */
    public function tarefas(): HasMany
    {
        return $this->hasMany(Tarefa::class, 'user_id');
    }

    /**
     * Define a relação com o modelo Observacao.
     * Um utilizador pode ter muitas observações.
     */
    public function observacoes(): HasMany
    {
        return $this->hasMany(Observacao::class, 'user_id');
    }
}
