<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('livros')->middleware('auth')->group(function (){
    Route::get('adicionar',[\App\Http\Controllers\LivrosController::class,'formulario']);
    Route::post('save', [\App\Http\Controllers\LivrosController::class,'save'])->name('livros.save');
});

/*
Route::prefix('categorias')->middleware('auth')->group(function(){
    Route::get('adicionar',[\App\Http\Controllers\CategoriasController::class,'formulario']);
    Route::post('save',[\App\Http\Controllers\CategoriasController::class,'save'])->name('categorias.save);
});
*/

Route::get('/categorias/adicionar',[\App\Http\Controllers\CategoriasController::class, 'index']);
