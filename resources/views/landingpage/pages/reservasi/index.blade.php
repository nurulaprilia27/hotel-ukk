@extends('landingpage.app')

@section('content')
<div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">
    <!-- -------- START Features w/ pattern background & stats & rocket -------- -->
    <section class="pb-5 position-relative mx-n3">
        <div class="container p-5">
            <div class="row">
                @foreach ($kamars as $item)
                <div class="col-lg-6 col-12">
                    <div class="card card-profile mt-4">
                        <div class="row p-3">
                            <div class="col-lg-12 col-md-6 col-12 mt-n5">
                                <a href="javascript:;">
                                    <div class="pe-md-0">
                                        <img class="w-100 border-radius-md shadow-lg"
                                            src="{{ url('/storage' . $item->path_img) }}" alt="image">
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-8 col-md-6 col-12 my-auto">
                                <div class="card-body ps-lg-0">
                                    <h5 class="mb-0">{{ $item->nama_kamar }}</h5>
                                    <h6 class="text-info">Rp . {{ number_format($item->harga_malam) }}</h6>
                                    <ul class="list-group list-group-flush">
                                        @forelse ($item->fasilitas_kamars as $fasilitas)

                                        <li class="list-group-item"><i class="fa fa-arrow-circle-o-right text-sm me-2"
                                                aria-hidden="true"></i>{{ $fasilitas->nama_fasilitas }}</li>

                                        @empty
                                        <li class="list-group-item"><i class="fa fa-arrow-circle-o-right text-sm me-2"
                                                aria-hidden="true"></i>Kamar Saja</li>
                                        @endforelse
                                    </ul>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 py-3 mt-auto ms-auto">
                                <a href="{{ url('reservasi/' . $item->id) }}" class="btn btn-primary">Lihat</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- -------- END PRE-FOOTER 1 w/ SUBSCRIBE BUTTON AND IMAGE ------- -->
</div>
@endsection