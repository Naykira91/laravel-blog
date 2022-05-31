<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\PublicCategoryController;
use App\Http\Controllers\PublicPostController;
use App\Http\Controllers\PublicTagController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PublicPostController::class, 'index'])->name('home');
Route::get('/article/{slug}', [PublicPostController::class, 'show'])->name('detail.post');
Route::get('/category/{slug}', [PublicCategoryController::class, 'show'])->name('detail.category');
Route::get('/tag/{slug}', [PublicTagController::class, 'show'])->name('detail.tag');
Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>'admin'], function(){
    Route::get('/',[Maincontroller::class, 'index'])->name('admin.index');
    Route::resource('/categories',CategoryController::class);
    Route::resource('/tags',TagController::class);
    Route::resource('/posts',PostController::class);
});

Route::group(['middleware'=> 'guest'], function(){
    Route::get('/register', [UserController::class,'create'])->name('register.create');
    Route::post('/register', [UserController::class,'store'])->name('register.store');

    Route::get('/login', [UserController::class,'loginForm'])->name('login.create');
    Route::post('/login', [UserController::class,'login'])->name('login');
});


Route::get('/logout', [UserController::class,'logout'])->name('logout');
