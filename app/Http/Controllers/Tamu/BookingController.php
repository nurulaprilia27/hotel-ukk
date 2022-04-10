<?php

namespace App\Http\Controllers\Tamu;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        // dd(Transaksi::where('user_id', auth()->id())->get());
        return view('landingpage.pages.booking.index', [
            'data' => Transaksi::where('user_id', auth()->id())->get()
        ]);
    }
}
