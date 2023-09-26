<?php

use App\Http\Controllers\Admin\BookingListController as AdminBookingListController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\RoomController as AdminRoomController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Pegawai\BookingListController as PegawaiBookingListController;
use App\Http\Controllers\Pegawai\DashboardController as PegawaiDashboardController;
use App\Http\Controllers\Pegawai\RoomController as PegawaiRoomController;
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

Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('bookings', AdminBookingListController::class);
    Route::post('/bookings-data', [AdminBookingListController::class, 'data']);
    Route::get('/download-document/{id}', [AdminBookingListController::class, 'downloadFile'])->name('download.documents');

    Route::resource('room', AdminRoomController::class);
    Route::post('/room-data', [AdminRoomController::class, 'data']);

    Route::resource('users', AdminUserController::class);
    Route::post('/users-data', [AdminUserController::class, 'data']);

    Route::put('/updateLink/{id}', [AdminBookingListController::class, 'updateLink'])->name('bookings.updateLink');
});

Route::middleware(['auth', 'role:Pegawai'])->group(function () {
    Route::get('/dashboard', [PegawaiDashboardController::class, 'index'])->name('pegawai.dashboard');

    Route::resource('/room-pegawai', PegawaiRoomController::class);
    Route::post('/rooms-pegawai-data', [PegawaiRoomController::class, 'data']);

    Route::resource('employee/booking', PegawaiBookingListController::class);
    Route::post('/booking-data', [PegawaiBookingListController::class, 'data']);
    Route::put('/updateStatus/{id}', [PegawaiBookingListController::class, 'updateStatus'])->name('booking.updateStatus');

    Route::get('/download-resume/{id}', [PegawaiBookingListController::class, 'downloadFile'])->name('download.document');
});
