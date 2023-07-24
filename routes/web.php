<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookingListController;
use App\Http\Controllers\UserController;
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
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('bookings', BookingListController::class);
Route::post('/bookings-data', [BookingListController::class, 'data']);

Route::resource('users', UserController::class);
Route::post('/users-data', [UserController::class, 'data']);