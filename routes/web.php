<?php

use App\Http\Controllers\BookingListController;
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

// Route::get('/', function () {
//     return view('pages.admin.dashboard');
// });

Auth::routes();

Route::prefix('/')
    ->get('/', [\App\Http\Controllers\Pegawai\DashboardController::class, 'index'])
    ->middleware(['auth', 'which.home'])
    ->name('pegawai.dashboard');

Route::prefix('/')
    ->middleware(['auth', 'is.pegawai'])
    ->group(function(){
        Route::get('/dashboard', [App\Http\Controllers\Pegawai\DashboardController::class, 'index'])->name('pegawai.dashboard');
        //Route::get('/dashboard', [App\Http\Controllers\Pegawai\DashboardController::class, 'showRole'])->name('pegawai.dashboard');
    });

    Route::prefix('admin')
    ->middleware(['auth', 'is.admin'])
    ->group(function(){
        Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
        //Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'showRole'])->name('admin.dashboard');
    });
    // Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.dashboard');
// Route::get('/pegawai/dashboard', [App\Http\Controllers\HomeController::class, 'show'])->name('pegawai.dashboard');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::resource('bookings', BookingListController::class);
    Route::post('/bookings-data', [BookingListController::class, 'data']);
