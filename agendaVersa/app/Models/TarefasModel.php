<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarefasModel extends Model
{
    use HasFactory;

    protected $table = 'tarefa';

    protected $fillable = [
        'titulo',
        'descricao',
        'hora_inicio',
        'hora_fim',
        'usuario_id' 
    ];

    public function usuario()
    {
        return $this->belongsTo(UsuarioModel::class, 'usuario_id');
    }
}
