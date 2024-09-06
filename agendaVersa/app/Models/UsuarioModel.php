<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UsuarioModel extends Model
{
    protected $table = 'usuario';
    public $timestamps = false; 


    protected $fillable = [
        'nome',
        'sobrenome',
        'email',
        'senha'
    ];

    public function verificarSenha($senha)
    {
        return Hash::check($senha, $this->senha);
    }
}
