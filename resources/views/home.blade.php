@extends('layouts.app')

@section('content')
    <div class="row justify-content-center align-items-center mb-4">
        <div class="col-md-11">
            <a href="#" class="btn btn-info  btn-lg btn-block">Gallery <span class="cil-plus btn-icon"></span></a>
        </div>
    </div>
    <div class="row justify-content-center">
        @for ($i = 1; $i <= 6; $i++)
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('images/sample' . $i . '.jpg') }}" class="card-img-top" alt="..." height="200">
                    <div class="card-img-overlay">
                        <h5 class="card-title "
                            style="text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;">Judul
                            Karya</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text">Ini adalah deskripsi dari karya yang ditampilkan.</p>
                    </div>
                </div>
            </div>
        @endfor
    </div>
@endsection
