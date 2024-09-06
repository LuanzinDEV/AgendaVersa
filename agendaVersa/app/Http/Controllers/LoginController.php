<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\UsuarioModel;
use Illuminate\Support\Facades\Hash;

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
            return view('home');
        } else {
            return response()->json(['message' => 'Credenciais inválidas.'], 401);
        }
        
    }
}
