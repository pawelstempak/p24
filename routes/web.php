<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\UploadController;
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

Route::redirect('/', '/login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('/articles/{table}', [ArticlesController::class,'Articles'])->name('articles');
    Route::get('/article/{table}/edit/{id}', [ArticlesController::class,'editArticle'])->name('edit_article');
    Route::post('/article/{table}/edit/{id}', [ArticlesController::class,'storeArticle'])->name('store_article'); 
    Route::get('/new_article/{table}', function ($table) {
        return view('articles.new_article');
    })->name('new_article');
    Route::post('/new_article/{table}', [ArticlesController::class,'storeNewArticle'])->name('store_new_article'); 
    Route::get('/article/{table}/delete/{id}', [ArticlesController::class,'deleteArticle'])->name('delete_article');
    Route::get('/article/{table}/{status}/{id}', [ArticlesController::class,'changeStatusArticle'])->name('status_article');

    Route::post('/upload', [UploadController::class,'uploadImage'])->name('upload'); 
    
});
