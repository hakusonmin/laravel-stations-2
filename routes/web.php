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

//movie
Route::get('/movies', [MovieController::class, 'index'])->name('user.movie.index');;

// Route::get('URL', [Controllerの名前::class, 'Controller内のfunction名']);
Route::get('/admin/movies', [AdminMovieController::class, 'index'])->name('admin.movie.index');
Route::get('/admin/movies/create', [AdminMovieController::class, 'create'])->name('admin.movie.create');
Route::post('/admin/movies/store',[AdminMovieController::class, 'store'])->name('admin.movie.store');
Route::get('/admin/movies/{id}/edit', [AdminMovieController::class, 'edit'])->name('admin.movie.edit');

Route::get('/admin/movies/{id}/update', [AdminMovieController::class, 'update'])->name('admin.movie.update');
Route::patch('/admin/movies/{id}/update', [AdminMovieController::class, 'update'])->name('admin.movie.update');

Route::get('/admin/movies/{id}/destroy', [AdminMovieController::class, 'destroy'])->name('admin.movie.destroy');
Route::delete('/admin/movies/{id}/destroy', [AdminMovieController::class, 'destroy'])->name('admin.movie.destroy');






// Route::get('/practice', [PracticeController::class, 'sample']);
// Route::get('/practice2', [PracticeController::class, 'sample2']);
// Route::get('/practice3', [PracticeController::class, 'sample3']);
// Route::get('/getPractice', [PracticeController::class, 'getPractice']);
