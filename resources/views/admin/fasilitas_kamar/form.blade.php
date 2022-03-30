@extends('layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Fasilitas Kamar</h6>
                    <hr>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <form
                        action="{{ $data ? route('fasilitas_kamar.update', $data->id) : route('fasilitas_kamar.store') }}"
                        method="post">
                        @csrf
                        @method($data ? 'put' : 'post')
                        <div class="row px-4 mb-2">
                            <div class="col-2">
                                <label for="kamar" class="col-form-label">Tipe Kamar</label>
                            </div>
                            <div class="col-8"></label>
                                <select class="form-control" name="kamar" id="kamar">
                                    <option disabled>Pilih Kamar</option>
                                    @foreach ($kamar as $item)
                                    <option value="{{ $item->id }}" @if ($data) {{ $data->kamar_id == $item->id ?
                                        'selected' : '' }}
                                        @endif>{{ $item->nama_kamar }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                {{-- <button type="submit" class="btn btn-primary mb-3">Simpan</button> --}}
                            </div>
                        </div>
                        <div class="row px-4">
                            <div class="col-2">
                                <label for="nama_fasilitas" class="col-form-label">Nama Fasilitas</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="nama_fasilitas" id="nama_fasilitas"
                                    value="{{ $data ? $data->nama_fasilitas : '' }}">
                            </div>
                            <div class="col-2">
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