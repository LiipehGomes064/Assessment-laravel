<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Importe o modelo User

class UserinfoController extends Controller
{
    public function index($id)
    {
        $user = User::findOrFail($id); // Busca o usuário pelo ID
        
        return view('userinfo', ['user' => $user]);
    }
}
