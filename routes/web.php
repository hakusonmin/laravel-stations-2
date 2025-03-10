<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SheetController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\AdminScheduleController;
use App\Http\Controllers\ReservationController;

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
Route::get('/admin/movies', [AdminMovieController::class, 'index'])->name('admin.movie.index');
Route::get('/admin/movies/create', [AdminMovieController::class, 'create'])->name('admin.movie.create');
Route::post('/admin/movies/store',[AdminMovieController::class, 'store'])->name('admin.movie.store');
Route::get('/admin/movies/{id}',[AdminMovieController::class, 'show'])->name('admin.movie.show');
Route::get('/admin/movies/{id}/edit', [AdminMovieController::class, 'edit'])->name('admin.movie.edit');

//User系
Route::get('/movies', [MovieController::class, 'index'])->name('user.movie.index');
Route::get('/movies/{id?}', [MovieController::class, 'show'])->name('user.movie.show');
Route::get('/sheets', [SheetController::class, 'classicIndex'])->name('user.sheet.classicIndex');
Route::get('/movies/{movie_id?}/schedules/{schedule_id?}/sheets', [SheetController::class, 'index'])->name('user.sheet.index');
Route::get('/movies/{movie_id}/schedules/{schedule_id}/reservations/create', [ReservationController::class, 'create'])->name('user.reservation.create');
Route::post('/reservations/store', [ReservationController::class, 'store'])->name('user.reservation.store');



Route::get('/admin/movies/{id}/update', [AdminMovieController::class, 'update'])->name('admin.movie.update');
Route::patch('/admin/movies/{id}/update', [AdminMovieController::class, 'update'])->name('admin.movie.update');
Route::get('/admin/movies/{id}/destroy', [AdminMovieController::class, 'destroy'])->name('admin.movie.destroy');
Route::delete('/admin/movies/{id}/destroy', [AdminMovieController::class, 'destroy'])->name('admin.movie.destroy');

//schedule系
Route::get('/admin/schedules',[AdminScheduleController::class, 'index'])->name('admin.schedule.index');
Route::get('/admin/schedules/{id}',[AdminScheduleController::class, 'show'])->name('admin.schedule.show');
Route::get('/admin/movies/{id}/schedules/create',[AdminScheduleController::class, 'create'])->name('admin.schedule.create');
Route::post('/admin/movies/{id}/schedules/store',[AdminScheduleController::class, 'store'])->name('admin.schedule.store');
Route::get('/admin/schedules/{scheduleId}/edit',[AdminScheduleController::class, 'edit'])->name('admin.schedule.edit');
Route::get('/admin/schedules/{scheduleId}/update',[AdminScheduleController::class, 'update'])->name('admin.schedule.update');
Route::patch('/admin/schedules/{scheduleId}/update',[AdminScheduleController::class, 'update'])->name('admin.schedule.update');
Route::get('/admin/schedules/{scheduleId}/destroy',[AdminScheduleController::class, 'destroy'])->name('admin.schedule.destroy');
Route::delete('/admin/schedules/{scheduleId}/destroy',[AdminScheduleController::class, 'destroy'])->name('admin.schedule.destroy');

// Route::get('/practice', [PracticeController::class, 'sample']);
// Route::get('/practice2', [PracticeController::class, 'sample2']);
// Route::get('/practice3', [PracticeController::class, 'sample3']);
// Route::get('/getPractice', [PracticeController::class, 'getPractice']);
