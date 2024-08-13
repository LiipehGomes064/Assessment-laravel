<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\UserinfoController;
use App\Http\Controllers\EventsController;

//events page
Route::get('/events', [EventsController::class, 'index'])->name('events');
Route::get('/events/{event}/edit', [EventsController::class, 'edit'])->name('events.edit');
Route::put('/events/{event}', [EventsController::class, 'update'])->name('events.update');
Route::delete('/events/{event}', [EventsController::class, 'destroy'])->name('events.destroy');
Route::get('/events/create', [EventsController::class, 'create'])->name('events.create');
Route::post('/events', [EventsController::class, 'store'])->name('events.store');


//Pagina de ABout Us
Route::get('/aboutus',[AboutusController::class,'index'])->name('aboutus');

// Página de dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Página de login
Route::get('/login', [AuthController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Página de registro
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'register']);

//User Info Page
Route::get('{user}/userinfo/',[UserinfoController::class,'index'])->name('userinfo');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rotas de usuários
Route::get('/users/create', [UserController::class, 'showCreateForm'])->name('users.create.form');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

// Rota de edição de usuário
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

// Exclusão de usuário
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

//Termos e condicoes
Route::get('/terms',function(){
    return view('terms');
});
