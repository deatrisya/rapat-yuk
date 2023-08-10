<?php

use App\Http\Controllers\admin\RoomController as AdminRoomController;
use App\Http\Controllers\pegawai\DashboardController as PegawaiDashboardController;
use App\Http\Controllers\pegawai\RoomController as PegawaiRoomController;
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

Auth::routes();

// Rute untuk admin
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('bookings', AdminBookingListController::class);
    Route::post('/bookings-data', [AdminBookingListController::class, 'data']);

    Route::resource('room', AdminRoomController::class);
    Route::post('/room-data', [AdminRoomController::class, 'data']);

    Route::resource('users', AdminUserController::class);
    Route::post('/users-data', [AdminUserController::class, 'data']);
});

// Rute untuk user
Route::middleware(['auth', 'role:Pegawai'])->group(function () {
    Route::get('/dashboard', [PegawaiDashboardController::class, 'index'])->name('pegawai.dashboard');
    //Route::resource('/employee-booking', PegawaiBookingListController::class);
    //Route::post('/booking-data', [PegawaiBookingListController::class, 'data']);
    Route::resource('/room-pegawai', PegawaiRoomController::class);
    Route::post('/rooms-pegawai-data', [PegawaiRoomController::class, 'data']);
    //Route::resource('/employee-room', PegawaiRoomController::class);
});
