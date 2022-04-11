@extends('landingpage.app')

@section('content')
<div class="card card-body shadow-xl mx-3 mx-md-4 mt-n6">
    <!-- -------- START Features w/ pattern background & stats & rocket -------- -->
    <section class="pb-5 position-relative mx-n3">
        <div class="container p-5">
            <div class="row mx-5 px-5">
                {{-- {{ $data }} --}}
                @foreach ($data as $item)
                <div class="col-md-6 m-0 p-0">
                    <div class="card bg-dark text-white">
                        <img src="{{ ($data) ? url('/storage' . $item->path_img) : '' }}" class="w-100" alt=""
                            style="max-height: 600px">
                        <div class="card-img-overlay bg-transparent">
                            <h5 class="card-title bg-white rounded-pill text-center">{{ $item->nama_fasilitas_hotel }}
                            </h5>
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