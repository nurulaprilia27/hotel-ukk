<?php

namespace App\Http\Controllers\Tamu;

use App\Http\Controllers\Controller;
use App\Models\FasilitasHotel;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index()
    {
        return view('landingpage.pages.fasilitas.index', [
            'data' => FasilitasHotel::get()
        ]);
    }
}
