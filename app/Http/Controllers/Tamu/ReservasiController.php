<?php

namespace App\Http\Controllers\Tamu;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        return view('landingpage.pages.reservasi.index', [
            'kamars' => Kamar::get()
        ]);
    }
}
