<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\penerbanganController;
use App\Http\Controllers\fooController;
use App\Http\Controllers\Auth\LoginController;
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

Route::get('/penerbangan', [penerbanganController::class, 'index'])->name('penerbangan.index');
Route::get('/', [loginController::class, 'ShowLoginForm'])->name('login');
Route::prefix ('penerbangan') -> group(function(){
    Route::get('add', [penerbanganController::class, 'create'])->name('penerbangan.create');
    Route::post('store', [penerbanganController::class, 'store'])->name('penerbangan.store');
    Route::get('edit/{id}', [penerbanganController::class, 'edit'])->name('penerbangan.edit');
    Route::post('update/{id}', [penerbanganController::class, 'update'])->name('penerbangan.update');
    Route::post('delete/{id}', [penerbanganController::class, 'delete'])->name('penerbangan.delete');
    Route::post('softDelete/{id}', [penerbanganController::class, 'softDelete'])->name('penerbangan.softDelete');
    Route::post('restore/{id}', [penerbanganController::class, 'restore'])->name('penerbangan.restore');
});

Route::prefix ('foo') -> group(function(){
    Route::get('/foo', [fooController::class, 'index'])->name('foo.index');
    Route::get('add', [fooController::class, 'create'])->name('foo.create');
    Route::post('store', [fooController::class, 'store'])->name('foo.store');
    Route::get('edit/{id}', [fooController::class, 'edit'])->name('foo.edit');
    Route::post('update/{id}', [fooController::class, 'update'])->name('foo.update');
    Route::post('delete/{id}', [fooController::class, 'delete'])->name('foo.delete');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');