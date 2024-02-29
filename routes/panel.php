<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

Route::prefix('panel')->group(function (){

    Route::view('','panel.index')->name('panel.index')->middleware('permission:مشاهده داشبرد');

    Route::prefix('users')->controller(UserController::class)->group(function (){

        Route::view('','users.index',['users' => \App\Models\User::with('roles')->paginate(15)])->name('users.index')->middleware('permission:مشاهده لیست کاربران');

        Route::middleware('permission:ساخت کاربر')->group(function (){

            Route::view('create','users.create',['roles' => \Spatie\Permission\Models\Role::all()])->name('users.create');
            Route::post('','store')->name('users.store');

        });

        Route::prefix('{user:id}')->group(function (){

            Route::middleware(['permission:ویرایش کاربر','can:update,user'])->group(function (){

                Route::get('edit','edit')->name('users.edit');
                Route::post('update','update')->name('users.update');

            });


                Route::get('delete','delete')->name('users.delete')->middleware(['permission:حذف کاربر','can:delete,user']);


        });

    });

    Route::prefix('roles')->controller(RoleController::class)->group(function (){

        Route::view('','roles.index',['roles' => \Spatie\Permission\Models\Role::with('permissions')->paginate(15)])->name('roles.index')->middleware('permission:مشاهده لیست نقش ها');

        Route::middleware('permission:ساخت نقش')->group(function (){

            Route::view('create','roles.create',['permissions' => \Spatie\Permission\Models\Permission::all()])->name('roles.create');
            Route::post('','store')->name('roles.store');

        });

        Route::prefix('{role:id}')->group(function (){

            Route::middleware('permission:ویرایش نقش')->group(function (){

                Route::get('edit','edit')->name('roles.edit');
                Route::post('update','update')->name('roles.update');

            });

                Route::get('delete','delete')->name('roles.delete')->middleware('permission:حذف نقش');

        });


    });

    Route::prefix('categories')->controller(CategoryController::class)->group(function (){

        Route::view('','categories.index',['categories' => \App\Models\Category::paginate(15)])->name('categories.index')->middleware('permission:مشاهده لیست دسته بندی ها');

        Route::middleware('permission:ساخت دسته بندی')->group(function (){

            Route::view('create','categories.create')->name('categories.create');
            Route::post('','store')->name('categories.store');

        });

        Route::prefix('{category:id}')->group(function (){

            Route::middleware('permission:ویرایش دسته بندی')->group(function (){

                Route::get('edit','edit')->name('categories.edit');
                Route::post('update','update')->name('categories.update');

            });

                Route::get('delete','delete')->name('categories.delete')->middleware('permission:حذف دسته بندی');

        });

    });

    Route::prefix('tags')->controller(TagController::class)->group(function (){

        Route::view('','tags.index',['tags' => \App\Models\Tag::paginate(15)])->name('tags.index')->middleware('permission:مشاهده لیست برچسب ها');

        Route::middleware('permission:ساخت برچسب')->group(function (){

            Route::view('create','tags.create')->name('tags.create');
            Route::post('','store')->name('tags.store');

        });

        Route::prefix('{tag:id}')->group(function (){

            Route::middleware('permission:ویرایش برچسب')->group(function (){

                Route::get('edit','edit')->name('tags.edit');
                Route::post('update','update')->name('tags.update');

            });

                Route::get('delete','delete')->name('tags.delete')->middleware('permission:حذف برچسب');

        });

    });

    Route::prefix('articles')->controller(ArticleController::class)->group(function (){

        Route::get('','index')->name('articles.index')->middleware('permission:مشاهده لیست مقالات');

        Route::middleware('permission:ساخت مقاله')->group(function (){

            Route::view('create','articles.create',['tags' => \App\Models\Tag::all(),'categories' => \App\Models\Category::all()])->name('articles.create');
            Route::post('','store')->name('articles.store');

        });

        Route::prefix('{article:id}')->group(function (){

            Route::middleware('permission:ویرایش مقاله')->group(function (){

                Route::get('edit','edit')->name('articles.edit');
                Route::post('update','update')->name('articles.update');

            });

                Route::get('delete','delete')->name('articles.delete')->middleware('permission:حذف مقاله');

        });

    });

    Route::prefix('comments')->controller(CommentController::class)->group(function (){

        Route::view('','comments.index',['comments' => \App\Models\Comment::with('article','user','likes')->paginate(15)])->name('comments.index')->middleware('permission:مشاهده لیست نظرات');

                Route::get('{comment:id}/delete','delete')->name('comments.delete')->middleware('permission:حذف نظر');

    });


});
