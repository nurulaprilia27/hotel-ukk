@extends('layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Kamar Hotel</h6>
                    <hr>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <form
                        action="{{ $data ? route('kamar.update', $data->id) : route('kamar.store') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method($data ? 'put' : 'post')
                        <div class="row p-4">
                            <div class="col-4 mb-4">
                                <label for="nama_kamar" class="col-form-label">Nama Kamar</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="nama_kamar" id="nama_kamar"
                                    value="{{ $data ? $data->nama_kamar : '' }}">
                            </div>
                            <div class="col-4 mb-4">
                                <label for="harga_kamar" class="col-form-label">Harga Kamar</label>
                            </div>
                            <div class="col-8">
                                <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Rp</span>
                                <input type="number" class="form-control" name="harga_kamar" id="harga_kamar"
                                    value="{{ $data ? $data->harga_malam : '' }}">
                                </div>
                            </div>
                            <div class="col-4 mb-4">
                                <label for="jumlah_kamar" class="col-form-label">Jumlah Kamar</label>
                            </div>
                            <div class="col-8">
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" name="jumlah_kamar" id="jumlah_kamar"
                                    value="{{ $data ? $data->jumlah_kamar : '' }}">
                                    <span class="input-group-text" id="basic-addon1">kamar</span>
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="path_img" class="col-form-label">Foto Kamar</label>
                            </div>
                            <div class="col-8">
                                <input type="file" class="form-control" name="path_img" id="path_img"
                                    value="{{ $data ? $data->path_img : '' }}">
                                <hr>
                                <img src="{{ ($data) ? url('/storage' . $data->path_img) : '' }}" class="w-25 " alt="">
                            </div>
                            <div class="col-12 text-center mt-5">
                                <button type="submit" class="btn btn-primary mb-3">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection