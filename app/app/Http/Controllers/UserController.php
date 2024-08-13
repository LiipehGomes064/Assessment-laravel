<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Valide os dados recebidos do formulário de edição
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|integer|min:18',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'professional_summary' => 'nullable|string',
        ]);


        // Atualize os dados do usuário
        $user->update($validatedData);

        return redirect()->route('dashboard')->with('success', 'User updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('dashboard')->with('success', 'User deleted successfully!');
    }

    public function store(Request $request)
    {
        // Validação dos dados recebidos do formulário
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|integer|min:18',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'professional_summary' => 'nullable|string',
            'password' => 'required|string|min:6|confirmed',
            'image' => 'nullable|string|max:255',
        ]);

        // Criação do usuário com os dados validados
        $user = User::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'age' => $validatedData['age'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'professional_summary' => $validatedData['professional_summary'],
            'password' => bcrypt($validatedData['password']), // Criptografar a senha
        ]);

        // Redirecionamento ou resposta adequada
        return redirect()->route('dashboard')->with('success', 'User created successfully!');
    }

    public function showCreateForm()
    {
        // Retorna a view do formulário de criação de usuário
        return view('users.create');
    }

}
