@extends('landingpage.app') @section('content')
<div class="shadow-xl mx-3 mx-md-4 mt-n6">
    <!-- -------- START Features w/ pattern background & stats & rocket -------- -->
    <section class="pb-5 position-relative mx-n3">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card mb-2">
                        <form action="{{ route('reservasi.store', $data->id) }}" method="post">
                            @csrf
                            @method('post')
                            <div class="card-body row">
                                <div class="mb-3 col-md-3">
                                    <label for="exampleInputcheckin" class="form-label">Check-in</label>
                                    <input type="date" class="form-control border px-2" name='tanggal_checkin'
                                        id="tanggal_checkin">
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="exampleInputcheckin" class="form-label">Check-out</label>
                                    <input type="date" class="form-control border px-2" name='tanggal_checkout'
                                        id="tanggal_checkout">
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label for="exampleInputcheckin" class="form-label">Jumlah Kamar dipesan</label>
                                    <input type="number" class="form-control border px-2" name='jumlah_kamar'
                                        id="jumlah_kamar">
                                </div>
                                <div class="mb-3 col-md-3">
                                    <hr>
                                    {{-- <br> --}}
                                    <button type="submit" class="btn btn-primary">Pesan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card mb-2">
                        <div class="card-body row">
                            <div class="col-md-6">
                                <label for="exampleInputcheckin" class="form-label">Nama Pemesan</label>
                                <input type="text" value="{{ auth()->user()->name }}" readonly class="form-control px-2"
                                    name='name' id="name">
                            </div>

                            <div class="col-md-6">
                                <label for="exampleInputcheckin" class="form-label">email</label>
                                <input type="email" value="{{ auth()->user()->email }}" readonly
                                    class="form-control px-2" name='email' id="email">
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body row">
                            <div class="col-md-6">
                                <img src="{{ url('/storage' . $data->path_img) }}" alt="" class="img-thumbnail">
                            </div>
                            <div class="col-md-6">
                                <h2>{{ $data->nama_kamar }}</h2>
                                <ul class="list-group">
                                    @if (isset($data->fasilitas_kamars))

                                    @foreach ($data->fasilitas_kamars as $item)
                                    <li class="list-group-item"><i class="fa fa-arrow-circle-o-right text-sm me-2"
                                            aria-hidden="true"></i>{{ $item->nama_fasilitas }}</li>
                                    @endforeach

                                    @else
                                    <li class="list-group-item"><i class="fa fa-arrow-circle-o-right text-sm me-2"
                                            aria-hidden="true"></i>Kamar Saja</li>
                                    @endif
                                    <li class="list-group-item"><i class="fa fa-arrow-circle-o-right text-sm me-1"
                                            aria-hidden="true"></i>
                                        {{ number_format($data->jumlah_kamar) }} Kamar
                                    </li>
                                    <li class="list-group-item">
                                        Rp . {{ number_format($data->harga_malam) }} / Malam
                                    </li>
                                </ul>
                                {{-- {{ $data }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- -------- END PRE-FOOTER 1 w/ SUBSCRIBE BUTTON AND IMAGE ------- -->
</div>
@endsection