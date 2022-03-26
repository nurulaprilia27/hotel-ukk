@extends('layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Fasilitas Hotel</h6>
                    <hr>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <form
                        action="{{ $data ? route('fasilitas_hotel.update', $data->id) : route('fasilitas_hotel.store') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method($data ? 'put' : 'post')
                        <div class="row p-4">
                            <div class="col-4 mb-4">
                                <label for="nama_fasilitas" class="col-form-label">Nama Fasilitas</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="nama_fasilitas" id="nama_fasilitas"
                                    value="{{ $data ? $data->nama_fasilitas_hotel : '' }}">
                            </div>
                            <div class="col-4">
                                <label for="nama_fasilitas" class="col-form-label">Foto Fasilitas</label>
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