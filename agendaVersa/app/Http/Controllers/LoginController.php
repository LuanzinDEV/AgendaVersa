<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\UsuarioModel;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function validaLogin(LoginRequest $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required'
        ]);

        $usuario = UsuarioModel::where('email', $request->input('email'))->first();

        if ($usuario && $usuario->verificarSenha($request->input('senha'))) {
            // Autentica o usuário e redireciona para a página inicial
            Auth::login($usuario);
            return redirect()->route('home');
        } else {
            return response()->json(['message' => 'Credenciais inválidas.'], 401);
        }
    }
}

