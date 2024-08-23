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
Route::middleware('auth:sanctum')->get('/events/{event}/edit', [EventsController::class, 'edit'])->middleware('admin')->name('events.edit');
Route::put('/events/{event}', [EventsController::class, 'update'])->middleware('admin')->name('events.update');
Route::delete('/events/{event}', [EventsController::class, 'destroy'])->middleware('admin')->name('events.destroy');
Route::get('/events/create', [EventsController::class, 'create'])->middleware('admin')->name('events.create');
Route::post('/events', [EventsController::class, 'store'])->middleware('admin')->name('events.store');


//About us Page
Route::get('/aboutus',[AboutusController::class,'index'])->name('aboutus');

// Dashboard page
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

// Login Page
Route::get('/login', [AuthController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login']);


//User Info Page
Route::get('{user}/userinfo/',[UserinfoController::class,'index'])->middleware('admin')->name('userinfo');

// Logout
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// User Routes
Route::get('/users/create', [UserController::class, 'showCreateForm'])->middleware('admin')->name('users.create.form');
Route::post('/users', [UserController::class, 'store'])->middleware('admin')->name('users.store');

// Edit Users
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('admin')->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->middleware('admin')->name('users.update');

// Destroy users
Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware('admin')->name('users.destroy');

//Terms and conditions
Route::get('/terms',function(){
    return view('terms');
});