<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\RegistroController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/registrar', [RegistroController::class, 'create'])->name('registrar');
Route::post('/login', [LoginController::class, 'validaLogin'])->name('logar');