@extends('landingpage.app') @section('content')
<div class="shadow-xl mx-3 mx-md-4 mt-n6">
    <!-- -------- START Features w/ pattern background & stats & rocket -------- -->
    <section class="pb-5 position-relative mx-n3">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body row">
                            <div class="col-md-6">
                                <img src="{{ url('/storage' . $data->path_img) }}" alt="" class="img-thumbnail">
                            </div>
                            <div class="col-md-6">
                                <h2>{{ $data->nama_kamar }}</h2>
                                <ul class="list-group">
                                    @foreach ($data->fasilitas_kamars as $item)
                                    <li class="list-group-item"><i class="fa fa-arrow-circle-o-right text-sm me-2"
                                        aria-hidden="true"></i>{{ $item->nama_fasilitas }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-4">
                    <label for="exampleInputcheckin" class="form-label">Check-in</label>
                    <input type="date" class="form-control" name='tanggal_checkin' id="tanggal_checkin">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="exampleInputcheckin" class="form-label">Check-out</label>
                    <input type="date" class="form-control" name='tanggal_checkout' id="tanggal_checkout">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="exampleInputcheckin" class="form-label">Jumlah Kamar dipesan</label>
                    <input type="number" class="form-control" name='jumlah_kamar' id="jumlah_kamar">
                </div>
            </div>
            <div class="row">
            <div class="col-md-6">
                <label for="exampleInputcheckin" class="form-label">Nama Pemesan</label>
                <input type="text" value="{{ auth()->user()->name }}" readonly class="form-control" name='name' id="name">
            </div>

            <div class="col-md-6">
                <label for="exampleInputcheckin" class="form-label">email</label>
                <input type="email" value="{{ auth()->user()->email }}" readonly class="form-control" name='email' id="email">
            </div>
        </div>
        </div>
    </section>
    <!-- -------- END PRE-FOOTER 1 w/ SUBSCRIBE BUTTON AND IMAGE ------- -->
</div>
@endsection