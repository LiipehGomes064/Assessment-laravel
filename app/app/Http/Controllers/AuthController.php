<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
            // Obtendo o usuário autenticado
            $user = Auth::user();

            // Gerando um token usando Sanctum
            $token = $user->createToken('meu-token-secreto')->plainTextToken;

            // Redireciona para o dashboard e passa o token como sessão
            return redirect()->intended('dashboard')->with('token', $token);
        }

        // Se falhar, redirecione de volta para a página de login com uma mensagem de erro
        return redirect()->back()->withErrors([
            'email' => 'The credentials provided do not match our records.',
        ]);
    }

    // Logout do usuário
    public function logout(Request $request)
    {
        // Opcional: Revogar todos os tokens do usuário ao fazer logout
        $user = Auth::user();
        $user->tokens()->delete();

        Auth::logout();

        // Redirecione para a página inicial após o logout
        return redirect('/');
    }
}