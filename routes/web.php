<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [ProductController::class, 'index']);

Route::get('/administration', [ProductController::class, 'administration']);

Route::prefix('product')->group(function(){

    Route::get('/create', [ProductController::class, 'create']);

    Route::post('/store', [ProductController::class, 'store']);

    Route::post('/update/{product}', [ProductController::class, 'update']);

    Route::get('/edit/{product}', [ProductController::class, 'edit']);

    Route::get('/show/{product}', [ProductController::class, 'show']);

    Route::get('/delete/{product}', [ProductController::class, 'destroy']);

});





Auth::routes();

Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
