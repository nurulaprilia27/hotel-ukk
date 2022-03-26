<?php

namespace App\Http\Controllers;

use App\Models\FasilitasHotel;
use Illuminate\Http\Request;

class FasilitasHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.fasilitas_hotel.index', [
            'data' => FasilitasHotel::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { {
            return view('admin.fasilitas_hotel.form', [
                'data' => null
            ]);
    } }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_fasilitas' => 'required',
        ]);

        $data = new FasilitasHotel();
        $data->nama_fasilitas = $validated['nama_fasilitas'];
        $data->save();

        return redirect()->route('fasilitas_hotel.index')->with('success', 'data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.fasilitas_hotel.form', [
            'data' => FasilitasHotel::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_fasilitas' => 'required',
        ]); 
        $data = FasilitasHotel::find($id);
        $data->nama_fasilitas = $validated['nama_fasilitas'];
        $data->update();

        // Alert::success('Berhasil!', 'Data berhasil di simpan');

        return redirect()->route('fasilitas_hotel.index')->with('success', 'data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = FasilitasHotel::find($id);
        $data->delete();

        return redirect()->route('fasilitas_hotel.index')->with('success', 'data berhasil dihapus');
    }
}
