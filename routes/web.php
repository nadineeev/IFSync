<?php

use Illuminate\Support\Facades\Route;

// Página inicial (Landing Page)
Route::get('/', function () {
    return view('landing');
})->name('home');

// Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Registro
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

