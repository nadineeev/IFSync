<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\FrequenciaController;
use Illuminate\Support\Facades\Route;

// Landing page
Route::get('/', fn() => view('landing'))->name('landing');

// Login e registro
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// Menu principal (pós-login)
Route::get('/menu', fn() => view('menu'))
    ->middleware(['auth'])
    ->name('menu');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rotas futuras (temporárias) só pra evitar erro
Route::get('/agenda', fn() => 'Página de Agenda em construção')->name('agenda');
Route::get('/grade', fn() => 'Página de Grade em construção')->name('grade');
Route::get('/avaliacoes', fn() => 'Página de Avaliações em construção')->name('avaliacoes');

Route::get('/frequencia', [FrequenciaController::class, 'index'])
    ->name('frequencia')
    ->middleware('auth');

Route::get('/config', fn() => 'Página de Configurações em construção')
    ->middleware(['auth'])
    ->name('config');

Route::get('/disciplinas', [DisciplinaController::class, 'cadastrar'])
    ->middleware(['auth'])
    ->name('cadastroDisciplinas');

Route::post('/disciplinas/salvar', [DisciplinaController::class, 'salvar'])
    ->middleware(['auth'])
    ->name('salvarDisciplinas');
