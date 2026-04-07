<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

/** Register */
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

/** Login */
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

/** Dashboards */
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('tours', TourController::class);
});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::post('/add_package', [Admin::class, 'add_packages'])->name('packages');

    Route::get('/admin/packages',function(){
        return view('admin.packages');
    });

    Route::get('/admin/users',function(){
        return view('admin.users');
    });

    Route::get('/admin/reports', function(){
        return view('admin.reports');
    });

     Route::get('/admin/projects', function(){
        return view('admin.projects');
    });

     Route::get('/admin/add_packages', function(){
        return view('admin.add_package');
    });


});


Route::get('/get_packages', [Admin::class, 'get_packages'])->name('get_packages');
