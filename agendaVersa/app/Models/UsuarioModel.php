<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class UsuarioModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuario';

    protected $fillable = [
        'nome',
        'sobrenome',
        'email',
        'senha'
    ];

    /**
     * Verifica se a senha fornecida corresponde à senha armazenada.
     *
     * @param  string  $senha
     * @return bool
     */
    public function verificarSenha($senha)
    {
        return Hash::check($senha, $this->senha);
    }

    public function tarefas()
    {
        return $this->hasMany(TarefasModel::class, 'usuario_id');
    }
}
