<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

    // Exibe a tela de registro
    public function showRegister()
    {
        return view('auth.cadastro');
    }

    public function register(Request $request)
    {
        // Validação básica
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'telefone' => ['required', 'string', 'max:15'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);


        // Cria o usuário
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'password' => Hash::make($request->password),
        ]);

        // Faz login automaticamente
        Auth::login($user);

        // Redireciona para o menu principal
        return redirect()->route('menu');
    }
}
