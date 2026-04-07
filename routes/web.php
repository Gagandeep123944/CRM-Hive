<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('index');
})->name('home');

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Auth routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return "Welcome to dashboard";
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/packages', [PackageController::class, 'index'])->name('packages');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add/{id}', [CartController::class, 'add']);
Route::post('/cart/update/{id}', [CartController::class, 'update']);
Route::delete('/cart/remove/{id}', [CartController::class, 'remove']);
Route::get('/cart/data', [CartController::class, 'getCart']);
