<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function (){

    Route::prefix('register')->controller(RegisterController::class)->group(function (){
       Route::view('','auth.register')->name('register');
       Route::post('','store');
    });

    Route::prefix('login')->controller(LoginController::class)->group(function (){
        Route::view('','auth.login')->name('login');
        Route::post('','store');
    });

});
Route::middleware('auth')->group(function (){

   Route::get('/logout',LogoutController::class)->name('logout');

});
