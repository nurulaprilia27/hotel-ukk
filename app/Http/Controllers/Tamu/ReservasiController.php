<?php

namespace App\Http\Controllers\Tamu;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        // dd(Kamar::get()  );
        return view('landingpage.pages.reservasi.index', [
            'kamars' => Kamar::get()
        ]);
    }
    public function show($id)
    {
        $data = Kamar::find($id);

        if (!$data) {
            return abort(404);
        }

        return view('landingpage.pages.reservasi.show', [
            'data' => $data  
        ]);
    }
}
