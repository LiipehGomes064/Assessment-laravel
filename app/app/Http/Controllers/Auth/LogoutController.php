<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        $user = Auth::user();
    
        if ($user) {
            // Revogar todos os tokens do usuário
            $user->tokens()->delete();
        } else {
            // Se o usuário não estiver autenticado
            return redirect('/login')->withErrors(['message' => 'Usuário não autenticado']);
        }

        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
