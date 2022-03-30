@extends('landingpage.app')

@section('content')
<div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">
    <!-- -------- START Features w/ pattern background & stats & rocket -------- -->
    <section class="pb-5 position-relative mx-n3">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-start mb-5 mt-5">
                    <h3 class="text-white z-index-1 position-relative">The Executive Team</h3>
                    <p class="text-white opacity-8 mb-0">There’s nothing I really wanted to do in life that I wasn’t
                        able to get
                        good at. That’s my skill.</p>
                </div>
            </div>
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
                                        @foreach ($item->fasilitas_kamars as $item)

                                        <li class="list-group-item"><i class="fa fa-arrow-circle-o-right text-sm me-2"
                                                aria-hidden="true"></i>{{ $item->nama_fasilitas }}</li>
                                        @endforeach
                                    </ul>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12 py-3 mt-auto ms-auto">
                                <button type="button" class="btn btn-primary">Lihat</button>
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