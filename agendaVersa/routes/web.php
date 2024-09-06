<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\RegistroController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/registrar', [RegistroController::class, 'show'])->name('registrar.form');
Route::post('/registrar', [RegistroController::class, 'create'])->name('registrar');