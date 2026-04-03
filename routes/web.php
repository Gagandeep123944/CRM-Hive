<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureTokenIsValid;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/greeting', function(){
    return 'Hello World';
});

Route::get('/user', [UserController::class, 'index']);

Route::get('/profile', function(){
  
})->middleware(EnsureTokenIsValid::class);



/*Route::middleware([EnsureTokenIsValid::class])->group(function(){

    Route::get('/', function () {
        return 'its main';
    });


    Route::get('/profile', function () {
        return "profile";
    })->withoutMiddleware([EnsureTokenIsValid::class]);

});*/