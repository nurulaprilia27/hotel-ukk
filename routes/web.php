<?php

use App\Http\Controllers\FasilitasHotelController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FasilitasKamarController;

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


Route::get('/home', function () {
    return view('landingpage.pages.home');
});
Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();


Route::group(['middleware' => ['auth', 'CekRole:admin,resepsionis,tamu']], function () {
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
});
