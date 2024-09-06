<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
