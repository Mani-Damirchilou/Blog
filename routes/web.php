<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('auth')->group(function (){

    Route::prefix('panel')->group(function (){

       Route::view('','panel.index')->name('panel.index');

       Route::prefix('users')->controller(UserController::class)->group(function (){

           Route::view('','users.index',['users' => \App\Models\User::paginate(15)])->name('users.index')->middleware('permission:مشاهده لیست کاربران');

           Route::middleware('permission:ساخت کاربر')->group(function (){

               Route::view('create','users.create')->name('users.create');
               Route::post('','store')->name('users.store');

           });

           Route::middleware(['permission:ویرایش کاربر','can:update,user'])->group(function (){

               Route::get('{user:id}/edit','edit')->name('users.edit');
               Route::post('{user:id}/update','update')->name('users.update');

           });

           Route::middleware(['permission:حذف کاربر','can:delete,user'])->group(function (){

               Route::get('{user:id}/delete','delete')->name('users.delete');


           });
       });

    });

});


require __DIR__.'/auth.php';
