<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Exibe a view de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Processa o formulário de login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Se a autenticação for bem-sucedida, redirecione para o dashboard
            return redirect()->intended('dashboard');
        }

        // Se falhar, redirecione de volta para a página de login com uma mensagem de erro
        return redirect()->back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }

    // Logout do usuário
    public function logout(Request $request)
    {
        Auth::logout();

        // Redirecione para a página inicial após o logout
        return redirect('/dashboard');
    }
}
