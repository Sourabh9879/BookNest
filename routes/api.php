<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;

Route::controller(AuthController::class)->group(function () {
    
    Route::post('/signup', 'Register')->name('signup');
    Route::post('/login', 'LoginUser')->name('login');
    Route::post('/logout', 'LogoutUser')->name('logout');
    
});

Route::controller(BookController::class)->group(function () {
    Route::post('/storebook', 'store')->name('storebook');
    Route::put('/books/{id}', 'update')->name('updatebook');
});