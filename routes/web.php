<?php


use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryArticleController;
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

Route::view('','index',['articles' => \App\Models\Article::active()->latest()->paginate(12)])->name('index');

Route::get('categories/{category:slug}/articles',[CategoryArticleController::class,'index'])->name('categories.articles');

Route::get('articles/{article:slug}',[ArticleController::class,'show'])->name('articles.show')->can('view','article');

Route::middleware('auth')->group(function (){

    Route::get('/dark-mode/update',[DarkModeController::class,'update'])->name('dark-mode.update');


    require __DIR__.'/panel.php';

});


require __DIR__.'/auth.php';
