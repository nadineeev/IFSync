<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Exibe a tela de login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Faz o login
    public function login(Request $request)
    {
        // valida os campos do formulário
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // tenta autenticar
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('menu'));
        }

        // se falhar
        return back()->withErrors([
            'email' => 'E-mail ou senha incorretos.',
        ])->onlyInput('email');
    }

    // Faz o logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
