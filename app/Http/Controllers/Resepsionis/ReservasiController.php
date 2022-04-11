<?php

namespace App\Http\Controllers\Resepsionis;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index(Request $req)
    {
        // dd($req->all(), Carbon::today()->toDateString());
        $tanggal_checkin = $req->tanggal_checkin;
        $username = $req->username;
        $data = Transaksi::when(isset($tanggal_checkin), function ($q) use ($tanggal_checkin) {
            return $q->whereDate('tanggal_checkin', $tanggal_checkin);
        })->when(isset($username), function ($q) use ($username) {
            return $q->whereHas('user', function ($query) use ($username) {
                return $query->where('name', 'LIKE', '%' . $username . '%');
            });
        })->get();

        // dd($data);

        return view('resepsionis.reservasi.index', [
            'data' => $data
        ]);
    }
}
