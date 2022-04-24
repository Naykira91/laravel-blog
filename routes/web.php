<?php

use App\Http\Controllers\Admin\MainController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function(){
    Route::get('/',[Maincontroller::class, 'index'])->name('admin.index');
    Route::resource('/categories',CategoryController::class);
    Route::resource('/tags',TagController::class);
    Route::resource('/posts',PostController::class);
});
