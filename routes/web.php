<?php


use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserArticleController;
use App\Notifications\UserNotification;
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

Route::view('','index',['articles' => \App\Models\Article::with('user','category','views','likes')->active()->latest()->paginate(12)])->name('index');

Route::get('categories/{category:slug}/articles',[CategoryArticleController::class,'index'])->name('categories.articles');

Route::get('users/{user:name}/articles',[UserArticleController::class,'index'])->name('users.articles');

Route::get('search',[SearchController::class,'index'])->name('articles.search');

Route::get('articles/{article}',[ArticleController::class,'show'])->name('articles.show');


Route::middleware('auth')->group(function (){

    Route::get('dark-mode/update',[DarkModeController::class,'update'])->name('dark-mode.update');

    Route::get('notifications/mark-as-read',[NotificationController::class,'markAsRead'])->name('notifications.mark-as-read');

    Route::prefix('profile')->controller(ProfileController::class)->group(function (){
        Route::get('edit','edit')->name('profile.edit');
        Route::post('update','update')->name('profile.update');
    });

    Route::prefix('{likeable_type}/{likeable_id}')->controller(LikeController::class)->group(function (){
        Route::get('like','like')->name('likes.store');
        Route::get('dislike','dislike')->name('dislikes.store');
    });


    Route::post('articles/{article}/comments',[CommentController::class,'store'])->name('articles.comments.store');



    require __DIR__.'/panel.php';

});


Route::get('notification',fn() => auth()->user()->notify(new UserNotification('سلام خسته نباشید !','primary')));

require __DIR__.'/auth.php';
