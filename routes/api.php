<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::controller(AuthController::class)->group(function () {

Route::post('/signup', 'Register')->name('signup');
Route::post('/login', 'LoginUser')->name('login');
Route::post('/logout', 'LogoutUser')->name('logout');

});
