<?php

namespace App\Http\Controllers;

use App\Models\FasilitasKamar;
use App\Models\Kamar;
use App\Models\TipeKamar;
use Illuminate\Http\Request;

class FasilitasKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.fasilitas_kamar.index', [
            'data' => FasilitasKamar::orderBy('kamar_id')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fasilitas_kamar.form', [
            'data' => null,
            'kamar' => Kamar::get()
        ]);
        //
    }

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
            'kamar' => 'required',
        ]);
        // dd($validated);

        $data = new FasilitasKamar();
        $data->nama_fasilitas = $validated['nama_fasilitas'];
        $data->kamar()->associate((int)$validated['kamar']);
        $data->save();

        return redirect()->route('fasilitas_kamar.index')->with('success', 'data berhasil ditambah');

        // dd($validated['nama_fasilitas']);


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
        return view('admin.fasilitas_kamar.form', [
            'data' => FasilitasKamar::find($id),
            'kamar' => Kamar::get()
        ]);

        // $data ? 'ini ada data' : 'ini enggak'
        // if ($data) {
        //     'ini ada';
        // } else {
        //     'ini enggak';
        // }

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
        // dd($request->all());
        $validated = $request->validate([
            'nama_fasilitas' => 'required',
            'kamar' => 'required',
        ]);

        $data = FasilitasKamar::find($id);
        $data->nama_fasilitas = $validated['nama_fasilitas'];
        $data->kamar()->associate((int)$validated['kamar']);
        $data->update();

        // Alert::success('Berhasil!', 'Data berhasil di simpan');

        return redirect()->route('fasilitas_kamar.index')->with('success', 'data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $data = FasilitasKamar::find($id);
        $data->delete();

        return redirect()->route('fasilitas_kamar.index')->with('success', 'data berhasil dihapus');
    }
}
