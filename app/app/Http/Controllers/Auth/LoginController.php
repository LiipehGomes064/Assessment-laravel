<?php 

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember'); // Verifica se a opção "lembrar-me" está selecionada

        if (Auth::attempt($credentials, $remember)) {
            // Obtém o usuário autenticado
            $user = Auth::user();
            // Gerar um token usando Sanctum
            $token = $user->createToken('meu-token-secreto')->plainTextToken;

            // Redireciona para o dashboard e passa o token como sessão
            return redirect()->intended('dashboard')->with('token', $token);
        }

        // Se a autenticação falhar, redireciona de volta para a página de login com uma mensagem de erro
        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ])->withInput($request->only('email', 'remember'));
    }
}
