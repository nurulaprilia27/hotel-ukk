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
                    <form action="{{ route('fasilitas_kamar.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="row p-4">
                            <div class="col-2">
                                <label for="nama_fasilitas" class="col-form-label">Nama Fasilitas</label>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="nama_fasilitas" id="nama_fasilitas"
                                    value="">
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
{{-- <div class="table-responsive p-0">
    <table class="table align-items-center mb-0 text-center">
        <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" width="5%">
                    No</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                    Nama Fasilitas</th>
                <th class="text-secondary opacity-7"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>
                    <p class="text-xs font-weight-bold mb-0">Manager</p>
                </td>
                <td class="align-middle" width='20%'>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="" class="btn btn-primary btn-sm">
                            <i class="far fa-edit"></i>
                        </a>
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="document.getElementById(' form_delete').submit();">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </div>
                    <form action="" id="form_delete" method="post">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div> --}}