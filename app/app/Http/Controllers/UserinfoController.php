<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserinfoController extends Controller
{
    public function index($id)
    {
        $user = User::findOrFail($id);
        $defaultImageUrl = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcREZzyXcKhcDReIbBR3nCqR6RskPi7B_SXhi-PfaUl1vScZUkfgxIVJHECZngpaUo9_9ZY&usqp=CAU';
        $userImage = $user->image ? asset($user->image) : $defaultImageUrl;
        return view('userinfo', [
            'user' => $user,
            'userImage' => $userImage
        ]);
    }
}
