<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Nome da tabela existente
     */
    protected $table = 'usuarios';

    /**
     * A tabela NÃO tem timestamps
     */
    public $timestamps = false;

    /**
     * Campos que podem ser preenchidos
     */
    protected $fillable = [
        'nome',
        'email',
        'senha',
        'tipo',
    ];

    /**
     * Campos ocultos
     */
    protected $hidden = [
        'senha',
    ];

    /**
     * Override do método de senha
     * Laravel usa 'password', mas a tabela usa 'senha'
     */
    public function getAuthPassword()
    {
        return $this->senha;
    }

    /**
     * Verifica se o usuário é admin
     */
    public function isAdmin(): bool
    {
        return strtolower($this->tipo) === 'admin';
    }

    /**
     * Verifica se o usuário é gerente
     */
    public function isGerente(): bool
    {
        return strtolower($this->tipo) === 'gerente';
    }

    /**
     * Verifica se o usuário é vendedor
     */
    public function isVendedor(): bool
    {
        return strtolower($this->tipo) === 'vendedor';
    }

    /**
     * Accessor para 'name' (Laravel espera 'name', mas temos 'nome')
     */
    public function getNameAttribute()
    {
        return $this->nome;
    }

    /**
     * Accessor para 'role' (compatibilidade com o sistema de auth)
     */
    public function getRoleAttribute()
    {
        return $this->tipo;
    }
}