<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookingListController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('pages.admin.dashboard');
// });

Auth::routes();
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');


Route::resource('bookings', BookingListController::class);
Route::post('/bookings-data', [BookingListController::class, 'data']);


Route::resource('room', RoomController::class);
Route::post('/room-data', [RoomController::class, 'data']);

Route::prefix('/')
    ->get('/', [DashboardController::class, 'index'])
    ->middleware(['auth', 'which.home'])
    ->name('pegawai.dashboard');

Route::prefix('/')
    ->middleware(['auth', 'is.pegawai'])
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('pegawai.dashboard');
    });

Route::prefix('admin')
    ->middleware(['auth', 'is.admin'])
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    });
