<?php

namespace App\Http\Controllers;

use App\Http\Requests\TarefaRequest;
use App\Models\TarefasModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function store(TarefaRequest $request)
    {
        $usuarioId = Auth::id();

        //verifica se existe tarefa no periodo de tempo selecionado
        $existingTask = TarefasModel::where('usuario_id', $usuarioId)
            ->where(function($query) use ($request) {
                $query->whereBetween('hora_inicio', [$request->hora_inicio, $request->hora_fim])
                      ->orWhereBetween('hora_fim', [$request->hora_inicio, $request->hora_fim])
                      ->orWhere(function($query) use ($request) {
                          $query->where('hora_inicio', '<=', $request->hora_inicio)
                                ->where('hora_fim', '>=', $request->hora_fim);
                      });
            })
            ->exists();

        if ($existingTask) {
            return redirect()->back()->withErrors(['error' => 'Já existe uma tarefa no mesmo período.']);
        }

        TarefasModel::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'hora_inicio' => $request->hora_inicio,
            'hora_fim' => $request->hora_fim,
            'usuario_id' => $usuarioId,
        ]);

        return redirect()->route('tarefa')->with('success', 'Tarefa criada com sucesso.');
    }
}
