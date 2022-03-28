<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kamar.index', [
            'data' => Kamar::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kamar.form', [
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
        // dd($request->all());
        $validated = $request->validate([
            'nama_kamar' => 'required',
            'harga_kamar' => 'required',
            'jumlah_kamar' => 'required',
            // 'path_img' => 'required',
        ]);



        $data = new Kamar();
        if ($file = $request->file('path_img')) {
            $extensi  = $file->getClientOriginalExtension();
            $filename = Str::slug($request->nama_kamar) . "_" . date('Ymdhis') . ".{$extensi}";
            // $filename = Str::slug($filename, '_');

            Storage::putFileAs('public/kamar', $file, $filename);
            $data->path_img = "/kamar/{$filename}";
        }
        $data->nama_kamar = $validated['nama_kamar'];
        $data->harga_malam = $validated['harga_kamar'];
        $data->jumlah_kamar = $validated['jumlah_kamar'];
        $data->save();

        return redirect()->route('kamar.index')->with('success', 'data berhasil ditambah');
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
        return view('admin.kamar.form', [
            'data' => Kamar::find($id)
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

        // dd($request->all());
        $validated = $request->validate([
            'nama_kamar' => 'required',
            'harga_kamar' => 'required',
            'jumlah_kamar' => 'required',
            // 'path_img' => 'required',
        ]);



        $data = Kamar::find($id);
        if ($file = $request->file('path_img')) {
            if (Storage::disk('public')->exists($data->path_img)) {
                Storage::disk('public')->delete($data->path_img);
            }

            $extensi  = $file->getClientOriginalExtension();
            $filename = Str::slug($request->nama_kamar) . "_" . date('Ymdhis') . ".{$extensi}";
            // $filename = Str::slug($filename, '_');

            Storage::putFileAs('public/kamar', $file, $filename);
            $data->path_img = "/kamar/{$filename}";
        }
        $data->nama_kamar = $validated['nama_kamar'];
        $data->harga_malam = $validated['harga_kamar'];
        $data->jumlah_kamar = $validated['jumlah_kamar'];
        $data->save();

        return redirect()->route('kamar.index')->with('success', 'data berhasil ditambah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kamar::find($id);
        if (Storage::disk('public')->exists($data->path_img)) {
            Storage::disk('public')->delete($data->path_img);
        }
        $data->delete();

        return redirect()->route('kamar.index')->with('success', 'data berhasil dihapus');
    }
}
