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

Route::get('/', [App\Http\Controllers\VisitorController::class, 'index'])->name('visitor');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/visitor', [App\Http\Controllers\VisitorController::class, 'store'])->name('visitor_create');

Route::get('/daftar-tamu', [App\Http\Controllers\VisitorController::class, 'show'])->name('daftar_tamu');