<?php


use App\Http\Controllers\DarkModeController;
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

    Route::get('/dark-mode/update',[DarkModeController::class,'update'])->name('dark-mode.update');

    require __DIR__.'/panel.php';

});


require __DIR__.'/auth.php';
