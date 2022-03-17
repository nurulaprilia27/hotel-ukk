@extends('layouts.app')
@section('content') 
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Fasilitas</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td style="width: 20%" class="text-center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="" class="btn btn-primary btn-sm">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="document.getElementById('form_delete').submit();">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </div>
                                    <form action="" id="form_delete" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- <footer class="footer pt-3  ">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    <div class="copyright text-center text-sm text-muted text-lg-start">
                        Â© <script>
                            document.write(new Date().getFullYear())
                        </script>,
                        made with <i class="fa fa-heart"></i> by
                        <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                            Tim</a>
                        for a better web.
                    </div>
                </div>
            </div>
        </div>
    </footer> --}}
@endsection