<?php

namespace App\Http\Controllers;

use App\Http\Requests\Loja\RegistroRequest;
use App\Models\UsuarioModel;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistroController extends Controller
{
    public function show()
    {
        return view('registro'); // Certifique-se de ter uma view chamada 'registro.blade.php'
    }

    public function create(RegistroRequest $request)
    {
        // Aqui você pode criar o usuário e redirecionar ou retornar uma resposta
        UsuarioModel::create([
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
        ]);

        return redirect()->route('home'); // Ajuste conforme necessário
    }
}
