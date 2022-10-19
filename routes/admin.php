<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/sign-in',[HomeController::class, 'index'])->middleware('guest:admin')->name('admin.login');
Route::post('/sign-in',[HomeController::class, 'login'])->middleware('guest:admin')->name('admin.get.login');
Route::middleware('auth:admin')->group(function(){
Route::get('/logout',[HomeController::class, 'logout'])->name('admin.logout');

    Route::group(['prefix'=>'posts'],function(){
    

        Route::get('/index',[PostController::class, 'index'])->middleware('can:show_posts')->name('admin.posts.index');
        Route::get('/create',[PostController::class, 'create'])->middleware('can:create_post')->name('admin.posts.create');
        Route::post('/store',[PostController::class, 'store'])->name('admin.posts.store');
        Route::get('/edit/{id}',[PostController::class, 'edit'])->middleware('can:edit_post')->name('admin.posts.edit');
        Route::post('/update/{id}',[PostController::class, 'update'])->name('admin.posts.update');
        Route::get('/delete/{id}',[PostController::class, 'delete'])->middleware('can:delete_post')->name('admin.posts.delete');
});


    Route::group(['prefix'=>'users'],function(){

        Route::get('/index',[UserController::class, 'index'])->middleware('can:show_users')->name('admin.users.index');
        Route::get('/create',[UserController::class, 'create'])->middleware('can:create_user')->name('admin.users.create');
        Route::post('/store',[UserController::class, 'store'])->name('admin.users.store');
        Route::get('/edit/{id}',[UserController::class, 'edit'])->middleware('can:edit_user')->name('admin.users.edit');
        Route::post('/update/{id}',[UserController::class, 'update'])->name('admin.users.update');
        Route::get('/delete/{id}',[UserController::class, 'delete'])->middleware('can:delete_user')->name('admin.users.delete');
    });


    Route::group(['prefix'=>'roles'],function(){
    

        Route::get('/index',[RolesController::class, 'index'])->middleware('can:show_roles')->name('admin.roles.index');
        Route::get('/create',[RolesController::class, 'create'])->middleware('can:create_role')->name('admin.roles.create');
        Route::post('/store',[RolesController::class, 'store'])->name('admin.roles.store');
        Route::get('/edit/{id}',[RolesController::class, 'edit'])->middleware('can:edit_role')->name('admin.roles.edit');
        Route::post('/update/{id}',[RolesController::class, 'update'])->name('admin.roles.update');
        Route::get('/delete/{id}',[RolesController::class, 'delete'])->middleware('can:delete_role')->name('admin.roles.delete');
});

Route::group(['prefix'=>'admin-users'],function(){
    

    Route::get('/index',[UsersController::class, 'index'])->name('admin.admin.users.index');
    Route::get('/create',[UsersController::class, 'create'])->name('admin.admin.users.create');
    Route::post('/store',[UsersController::class, 'store'])->name('admin.admin.users.store');
    Route::get('/edit/{id}',[UsersController::class, 'edit'])->name('admin.admin.users.edit');
    Route::post('/update/{id}',[UsersController::class, 'update'])->name('admin.admin.users.update');
    Route::get('/delete/{id}',[UsersController::class, 'delete'])->name('admin.admin.users.delete');
});
});