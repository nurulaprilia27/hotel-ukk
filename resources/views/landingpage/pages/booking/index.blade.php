@extends('landingpage.app')

@section('content')
<div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">
    <!-- -------- START Features w/ pattern background & stats & rocket -------- -->
    <section class="pb-5 position-relative mx-n3">
        <div class="container p-5">
            <div class="row">
                <h2 class="text-center">Booking</h2>
                <table class="table table-hover mt-2 text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode</th>
                            <th scope="col">Check In</th>
                            <th scope="col">Check Out</th>
                            <th scope="col">Tipe Kamar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $no => $item)
                        <tr>
                            <th scope="row">{{ ++$no }}</th>
                            <td>{{ $item->kode }}</td>
                            <td>{{ $item->tanggal_checkin }}</td>
                            <td>{{ $item->tanggal_checkout }}</td>
                            <td>{{ $item->tipe_kamar ?
                                $item->tipe_kamar->nama_kamar : ''; }}</td>
                            <td><a class="btn btn-primary btn-sm"
                                    href="{{ route('reservasi.cetak', $item->id) }}">Lihat</a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" align="center">nothing</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- -------- END PRE-FOOTER 1 w/ SUBSCRIBE BUTTON AND IMAGE ------- -->
</div>
@endsection