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
Auth::routes();
Route::get('/',[ArticleController::class,'index']);
Route::get('/articles',[ArticleController::class,'index']);

//For JSON response return all results
Route::get('/list',[ArticleController::class,'list']);

Route::get('/articles/create',[ArticleController::class,'create'])->middleware('admin');
Route::post('/articles',[ArticleController::class,'store']);
Route::put('/articles/{article}', [ArticleController::class, 'update'])->middleware('admin');
Route::get('/articles/{article}', [ArticleController::class, 'show']);

//For JSON response return a specific result
Route::get('/show_articles/{article}', [ArticleController::class, 'show_article']);

Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->middleware('admin');
Route::delete('/articles/{article}',[ArticleController::class,'destroy'])->middleware('admin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
