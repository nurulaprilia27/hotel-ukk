<?php

use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\FasilitasHotelController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FasilitasKamarController;
use App\Http\Controllers\Tamu\ReservasiController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\Resepsionis\ReservasiController as ResepsionisReservasiController;
use App\Http\Controllers\Tamu\BookingController;
use App\Http\Controllers\Tamu\FasilitasController;

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
    return redirect('/redirectAuthenticatedUsers');
});

Route::get('/redirectAuthenticatedUsers', [RedirectAuthenticatedUsersController::class, 'home']);


Route::get('/home', function () {
    return view('landingpage.pages.home');
})->name('home');



Auth::routes();


Route::group(['middleware' => ['auth', 'CekRole:admin,resepsionis']], function () {
    // dashboard
    Route::view('dashboard', 'admin.dashboard')->name('dashboard');
});

Route::group(['middleware' => ['auth', 'CekRole:admin']], function () {
    Route::get('fasilitas_kamar', [FasilitasKamarController::class, 'index'])->name('fasilitas_kamar.index');
    Route::get('fasilitas_kamar/create', [FasilitasKamarController::class, 'create'])->name('fasilitas_kamar.create');
    Route::post('fasilitas_kamar', [FasilitasKamarController::class, 'store'])->name('fasilitas_kamar.store');
    Route::get('fasilitas_kamar/{id}', [FasilitasKamarController::class, 'edit'])->name('fasilitas_kamar.edit');
    Route::put('fasilitas_kamar/{id}', [FasilitasKamarController::class, 'update'])->name('fasilitas_kamar.update');
    Route::delete('fasilitas_kamar/{id}', [FasilitasKamarController::class, 'delete'])->name('fasilitas_kamar.delete');

    Route::resource('fasilitas_hotel', FasilitasHotelController::class);
    Route::resource('kamar', KamarController::class);

    Route::get('booking', [ReservasiController::class, 'index'])->name('booking.index');
});

Route::group(['middleware' => ['auth', 'CekRole:resepsionis']], function () {
    Route::get('resepsionis/reservasi', [ResepsionisReservasiController::class, 'index'])->name('resepsionis.reservasi.index');
});

Route::group(['middleware' => ['auth', 'CekRole:tamu,resepsionis']], function () {
    Route::get('reservasi/transaksi/{id}', [ReservasiController::class, 'cetakReservasi'])->name('reservasi.cetak');
});
Route::group(['middleware' => ['auth', 'CekRole:tamu']], function () {
    Route::get('reservasi', [ReservasiController::class, 'index'])->name('reservasi.index');
    Route::get('reservasi/{id}', [ReservasiController::class, 'show'])->name('reservasi.show');
    Route::post('reservasi/{id}', [ReservasiController::class, 'store'])->name('reservasi.store');

    Route::get('booking', [BookingController::class, 'index'])->name('booking.index');
    Route::get('fasilitas', [FasilitasController::class, 'index'])->name('fasilitas.index');
});
