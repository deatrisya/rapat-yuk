<?php

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

Route::get('/', function () {
    return view('pages.admin.dashboard');
});

Auth::routes();
Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'show'])->name('admin.dashboard');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
