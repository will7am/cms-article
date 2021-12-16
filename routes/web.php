<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

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
Route::get('/',[ArticleController::class,'index']);


Route::get('/articles',[ArticleController::class,'index']);
Route::get('/list',[ArticleController::class,'list']);
Route::get('/articles/create',[ArticleController::class,'create']);
Route::post('/articles',[ArticleController::class,'store']);
Route::put('/articles/{article}', [ArticleController::class, 'update']);
Route::get('/articles/{article}', [ArticleController::class, 'show']);
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit']);
Route::delete('/articles/{article}',[ArticleController::class,'destroy']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
