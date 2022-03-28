<?php

namespace App\Http\Controllers;

use App\Models\FasilitasHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
    { 
            return view('admin.fasilitas_hotel.form', [
                'data' => null
            ]);
        
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
            'path_img' => 'required',
        ]);



        $data = new FasilitasHotel();
        if ($file = $request->file('path_img')) {
            $extensi  = $file->getClientOriginalExtension();
            $filename = Str::slug($request->nama_fasilitas) . "_" . date('Ymdhis') . ".{$extensi}";
            // $filename = Str::slug($filename, '_');

            Storage::putFileAs('public/fasilitas_hotel', $file, $filename);
            $data->path_img = "/fasilitas_hotel/{$filename}";
        }
        $data->nama_fasilitas_hotel = $validated['nama_fasilitas'];
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
        if ($file = $request->file('path_img')) {
            if (Storage::disk('public')->exists($data->path_img)) {
                Storage::disk('public')->delete($data->path_img);
            }

            $extensi  = $file->getClientOriginalExtension();
            $filename = Str::slug($request->nama_fasilitas) . "_" . date('Ymdhis') . ".{$extensi}";

            Storage::putFileAs('public/fasilitas_hotel', $file, $filename);
            $data->path_img = "/fasilitas_hotel/{$filename}";
        }
        $data->nama_fasilitas_hotel = $validated['nama_fasilitas'];
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
    public function destroy($id)
    {
        $data = FasilitasHotel::find($id);
        if (Storage::disk('public')->exists($data->path_img)) {
            Storage::disk('public')->delete($data->path_img);
        }
        $data->delete();

        return redirect()->route('fasilitas_hotel.index')->with('success', 'data berhasil dihapus');
    }
}
