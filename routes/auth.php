<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function (){

    Route::prefix('register')->controller(RegisterController::class)->group(function (){
       Route::view('','auth.register')->name('register');
       Route::post('','store');
    });

});
