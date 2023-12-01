<?php

use App\Http\Controllers\HotelController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\ReservasiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::get('/search', [HotelController::class, 'search'])->name('search');
Route::get('pesan/{namakamar}/{namahotel}', [ReservasiController::class, 'pesan'])->name('pesan');


Route::get('/datakamar{id}', [HotelController::class, 'datakamar'])->name('datakamar');

Auth::routes();

Route::resource('hotel', HotelController::class);
Route::resource('kamar', KamarController::class);
Route::resource('reservasi', ReservasiController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
