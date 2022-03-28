@extends('layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Kamar Hotel</h6>
                    <a href="{{ route('kamar.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
                </div>

                {{-- <div class="alert alert-success" role="alert">
                    A simple success alert—check it out!
                </div> --}}
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 text-center">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        width="5%">
                                        No</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Foto Kamar</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nama Kamar</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Harga Kamar</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Jumlah Kamar</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $no => $item)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>
                                        <img src="{{ ($data) ? url('/storage' . $item->path_img) : '' }}" class="w-25"
                                            alt="">
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->nama_kamar }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">Rp . {{ number_format($item->harga_malam) }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->jumlah_kamar }}</p>
                                    </td>
                                    <td class="align-middle" width='20%'>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ route('kamar.edit', $item->id) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="document.getElementById('form_delete').submit();">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </div>
                                        <form action="{{ route('kamar.destroy', $item->id) }}"
                                            id="form_delete" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection