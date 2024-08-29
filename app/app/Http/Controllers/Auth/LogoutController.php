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
        $user = $request -> user();
    
        if ($user) {

            $user->tokens()->delete();
        } else {
            return redirect('/login')->withErrors(['message' => 'User not authenticated']);
        }

        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
