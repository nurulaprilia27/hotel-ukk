<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('landingpage.pages.home');
});


Auth::routes();


Route::group(['middleware' => ['auth', 'CekRole:admin,resepsionis,tamu']], function () {
    // dashboard
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::get('fasilitas_kamar', [FasilitasKamarController::class, 'index']);
