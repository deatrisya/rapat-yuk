<?php

use App\Http\Controllers\admin\RoomController as AdminRoomController;
use App\Http\Controllers\pegawai\RoomController as PegawaiRoomController;
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

Route::resource('room', AdminRoomController::class);
Route::post('/room-data', [AdminRoomController::class,'data']);

Route::resource('room-pegawai', PegawaiRoomController::class);
Route::post('/rooms-pegawai-data', [PegawaiRoomController::class,'data']);
