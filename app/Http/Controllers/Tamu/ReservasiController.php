<?php

namespace App\Http\Controllers\Tamu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        return view('landingpage.pages.reservasi.index');
    }
}