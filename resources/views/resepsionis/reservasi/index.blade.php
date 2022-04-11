@extends('layouts.app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Transaksi</h6>
                    <hr>
                </div>
                <form action="{{ route('resepsionis.reservasi.index') }}" method="get" class="row px-4">
                    <div class="mb-3 col-md-3">
                        <label for="exampleInputcheckin" class="form-label">Filter Check-in</label>
                        <input type="date" class="form-control border px-2" name='tanggal_checkin' id="tanggal_checkin">
                    </div>
                    <div class="mb-3 col-md-3">
                        <label for="exampleInputcheckin" class="form-label">Filter Username</label>
                        <input type="text" class="form-control border px-2" name='username' id="username">
                    </div>
                    <div class="col-md-3">
                        <hr>
                        <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                    </div>
                </form>

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
                                        Kode</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Check In</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Check Out</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Tipe Kamar</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Username</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $no => $item)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->kode }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->tanggal_checkin }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->tanggal_checkout}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $item->tipe_kamar ?
                                            $item->tipe_kamar->nama_kamar : ''; }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">
                                            {{ $item->user ? $item->user->name : '' }}
                                        </p>
                                    </td>
                                    <td class="align-middle" width='20%'>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('reservasi.cetak', $item->id) }}">Lihat</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" align="center" class="text-muted text-sm">Nothing</td>
                                </tr>
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