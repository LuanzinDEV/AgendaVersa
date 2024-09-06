<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class UsuarioModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuario';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'sobrenome',
        'email',
        'senha'
    ];

    protected $hidden = [
        'senha',
    ];

    public function verificarSenha($senha)
    {
        return Hash::check($senha, $this->senha);
    }
}

