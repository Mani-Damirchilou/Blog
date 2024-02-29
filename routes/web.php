<?php


use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SearchController;
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

Route::get('articles/{article}',[ArticleController::class,'show'])->name('articles.show');

Route::get('search',[SearchController::class,'index'])->name('articles.search');

Route::middleware('auth')->group(function (){

    Route::get('/dark-mode/update',[DarkModeController::class,'update'])->name('dark-mode.update');

    Route::get('{likeable_type}/{likeable_id}/like',[LikeController::class,'like'])->name('likes.store');
    Route::get('{likeable_type}/{likeable_id}/dislike',[LikeController::class,'dislike'])->name('dislikes.store');

    Route::prefix('articles')->group(function (){

        Route::prefix('{article}')->group(function (){

            Route::post('comments',[CommentController::class,'store'])->name('articles.comments.store');

        });

    });

    require __DIR__.'/panel.php';

});


require __DIR__.'/auth.php';
