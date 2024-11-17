<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AdminMovieController;


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

// Route::get('URL', [Controllerの名前::class, 'Controller内のfunction名']);
Route::get('/admin/movies', [AdminMovieController::class, 'index'])->name('movie.index');
Route::get('/admin/movies/create', [AdminMovieController::class, 'create'])->name('movie.create');
Route::post('/admin/movies/store',[AdminMovieController::class, 'store'])->name('movie.store');
Route::get('/admin/movies/{id}/edit', [AdminMovieController::class, 'edit'])->name('movie.edit');
Route::get('/admin/movies/{id}/update', [AdminMovieController::class, 'update'])->name('movie.update');
Route::patch('/admin/movies/{id}/update', [AdminMovieController::class, 'update'])->name('movie.update');

Route::get('/movies', [MovieController::class, 'index']);
Route::get('/practice', [PracticeController::class, 'sample']);
Route::get('/practice2', [PracticeController::class, 'sample2']);
Route::get('/practice3', [PracticeController::class, 'sample3']);
Route::get('/getPractice', [PracticeController::class, 'getPractice']);
