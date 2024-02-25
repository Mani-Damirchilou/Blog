<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;
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

        Route::middleware(['permission:ویرایش کاربر','can:update,user'])->prefix('{user:id}')->group(function (){

            Route::get('edit','edit')->name('users.edit');
            Route::post('update','update')->name('users.update');

        });

        Route::middleware(['permission:حذف کاربر','can:delete,user'])->prefix('{user:id}')->group(function (){

            Route::get('delete','delete')->name('users.delete');

        });
    });

    Route::prefix('roles')->controller(RoleController::class)->group(function (){

        Route::view('','roles.index',['roles' => \Spatie\Permission\Models\Role::with('permissions')->paginate(15)])->name('roles.index')->middleware('permission:مشاهده لیست نقش ها');

        Route::middleware('permission:ساخت نقش')->group(function (){

            Route::view('create','roles.create',['permissions' => \Spatie\Permission\Models\Permission::all()])->name('roles.create');
            Route::post('','store')->name('roles.store');

        });

        Route::middleware('permission:ویرایش نقش')->prefix('{role:id}')->group(function (){

            Route::get('edit','edit')->name('roles.edit');
            Route::post('update','update')->name('roles.update');

        });

        Route::middleware('permission:حذف نقش')->prefix('{role:id}')->group(function (){

            Route::get('delete','delete')->name('roles.delete');

        });

    });

    Route::prefix('categories')->controller(CategoryController::class)->group(function (){

        Route::view('','categories.index',['categories' => \App\Models\Category::paginate(15)])->name('categories.index')->middleware('permission:مشاهده لیست دسته بندی ها');

        Route::middleware('permission:ساخت دسته بندی')->group(function (){

            Route::view('create','categories.create')->name('categories.create');
            Route::post('','store')->name('categories.store');

        });

        Route::middleware('permission:ویرایش دسته بندی')->prefix('{category:id}')->group(function (){

            Route::get('edit','edit')->name('categories.edit');
            Route::post('update','update')->name('categories.update');

        });

        Route::middleware('permission:حذف دسته بندی')->prefix('{category:id}')->group(function (){
           Route::get('delete','delete')->name('categories.delete');
        });
    });

});
