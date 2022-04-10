<?php

namespace App\Http\Controllers\Tamu;

use App\Http\Controllers\Controller;
use App\Models\Kamar;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
// use PDF;
use Barryvdh\DomPDF\Facade as PDF;

class ReservasiController extends Controller
{
    public function index()
    {
        // dd(Kamar::get());
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

    public function store(Request $req, $id)
    {
        // dd($req->all(), $id);

        $kamar = Kamar::find($id);

        // cari jumlah malam
        $startDate = Carbon::createFromFormat('Y-m-d', $req->tanggal_checkin);
        $endDate = Carbon::createFromFormat('Y-m-d', $req->tanggal_checkout);
        $jumlah_malam =  $startDate->diffInDays($endDate);
        $kamars = (int)$req->jumlah_kamar;
        // total_biaya
        $total_biaya = $kamar->harga_malam;
        if ($jumlah_malam >= 1) {
            $total_biaya = $total_biaya * $jumlah_malam;
        }

        if ($kamars >= 1) {
            $total_biaya = $total_biaya * $kamars;
        }

        if ($kamar->jumlah_kamar >= $kamars) {
            # code...

            $transaksi = new Transaksi();
            $transaksi->kode = "BOOK-" . time() . Str::upper(Str::random(5));
            $transaksi->user()->associate(auth()->id());
            $transaksi->tipe_kamar()->associate($kamar->id);
            $transaksi->tanggal_checkin = $req->tanggal_checkin;
            $transaksi->tanggal_checkout = $req->tanggal_checkout;
            $transaksi->jumlah_kamar = $kamars;
            $transaksi->jumlah_malam = $jumlah_malam;
            $transaksi->total_biaya = $total_biaya;

            // count jumlah kamar
            $countKamar = $kamar->jumlah_kamar - $kamars;

            $kamar->update([
                'jumlah_kamar' => $countKamar,
            ]);
            // dd($kamar->jumlah_kamar);
            $transaksi->save();
            return redirect()->route('reservasi.cetak', $transaksi->id);
        } else {
            return redirect()->back();
        }
    }

    public function cetakReservasi($id)
    {
        // dd($id);
        $transaksi = Transaksi::find($id);
        $pdf = PDF::loadView('components.invoice', compact('transaksi'));
        $pdf->setPaper('A5', 'landscape');
        return $pdf->stream();
    }
}
