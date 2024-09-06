<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarefasModel extends Model
{
    protected $table = 'tarefa';

    protected $fillable = [
        'titulo',
        'descricao',
        'hora_inicio',
        'hora_fim'
    ];
}
