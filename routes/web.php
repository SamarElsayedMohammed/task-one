<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Controller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('web.home');

Route::post('/sign-in',[Controller::class, 'login'])->middleware('guest:web')->name('get.login');
Route::get('/sign-in',[Controller::class, 'index'])->middleware('guest:web')->name('login');

Route::middleware('auth:web')->group(function(){

Route::get('/index',[PostController::class, 'index'])->name('post.index');
Route::get('/create',[PostController::class, 'create'])->name('post.create');
Route::post('/store',[PostController::class, 'store'])->name('post.store');
Route::get('/edit/{id}',[PostController::class, 'edit'])->name('post.edit');
Route::post('/update/{id}',[PostController::class, 'update'])->name('post.update');
Route::get('/delete/{id}',[PostController::class, 'delete'])->name('post.delete');


Route::get('user/index',[UserController::class, 'index'])->name('user.index');
Route::get('user/create',[UserController::class, 'create'])->name('user.create');
Route::post('user/store',[UserController::class, 'store'])->name('user.store');
Route::get('user//edit/{id}',[UserController::class, 'edit'])->name('user.edit');
Route::post('user/update/{id}',[UserController::class, 'update'])->name('user.update');
Route::get('user/delete/{id}',[UserController::class, 'delete'])->name('user.delete');

});
