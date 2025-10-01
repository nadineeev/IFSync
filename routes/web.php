<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'landing')->name('landing');

// Destinos dos botões (placeholders por enquanto)
Route::view('/register', 'auth.register')->name('register');
Route::view('/login', 'auth.login')->name('login');
Route::view('/sobre', 'about')->name('about');
