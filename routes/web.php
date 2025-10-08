<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Rotas da IFSync
|--------------------------------------------------------------------------
| Aqui ficam as rotas da sua aplicação: landing page, login, registro e menu.
| O sistema verifica se o usuário está logado antes de permitir acesso a páginas protegidas.
*/

// 🌍 Página inicial (Landing Page)
Route::get('/', function () {
    return view('landing');
})->name('home');

// 🧭 Tela de Login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login')
    ->middleware('guest');

// 🔐 Ação de Login (envio do formulário)
Route::post('/login', [AuthController::class, 'login'])
    ->name('login.post')
    ->middleware('guest');

// 🚪 Logout (encerra a sessão)
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// 🏠 Página principal após o login (Menu ou Dashboard)
Route::get('/menu', function () {
    return view('menu');
})->name('menu')->middleware('auth');

// 🧾 (opcional futuramente) Tela de Registro — ainda não funcional
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// 🚧 Exemplo de página protegida futura (Dashboard)
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');
