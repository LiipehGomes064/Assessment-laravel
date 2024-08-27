<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\UserinfoController;
use App\Http\Controllers\EventsController;

// Public Routes
Route::get('/aboutus', [AboutUsController::class, 'index'])->name('aboutus');
Route::get('/terms', function() {
    return view('terms');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Routes requiring authentication
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Events Routes
    Route::get('/events', [EventsController::class, 'index'])->name('events');
    Route::middleware('admin')->group(function () {
        Route::get('/events/create', [EventsController::class, 'create'])->name('events.create');
        Route::post('/events', [EventsController::class, 'store'])->name('events.store');
        Route::get('/events/{event}/edit', [EventsController::class, 'edit'])->name('events.edit');
        Route::put('/events/{event}', [EventsController::class, 'update'])->name('events.update');
        Route::delete('/events/{event}', [EventsController::class, 'destroy'])->name('events.destroy');
    });
    
    // User Routes
    Route::middleware('admin')->group(function () {
        Route::get('/users/create', [UserController::class, 'showCreateForm'])->name('users.create.form');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('{user}/userinfo/', [UserinfoController::class, 'index'])->name('userinfo');
    });
});

// Redirect to login if no route is matched
Route::get('/', function () {
    return redirect()->route('login');
});