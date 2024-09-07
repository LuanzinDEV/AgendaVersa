<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\TarefaController;

// Página de login
Route::get('/', [LoginController::class, 'index'])->name('login');

// Processa o login
Route::post('/login', [LoginController::class, 'validaLogin'])->name('logar');

// Processa o registro
Route::post('/registrar', [RegistroController::class, 'create'])->name('registrar');

// Página inicial após o login, exibindo o calendário
Route::get('/home', [HomeController::class, 'showCalendar'])->name('home')->middleware('auth');

//Exibir a pagina de tarefas
Route::get('/tarefas', [HomeController::class, 'tarefaPage'])->name('tarefa');


//Pagina de cadastrar tarefa
Route::post('/tarefa/registrar', [TarefaController::class, 'store'])->name('registrarTarefa');

