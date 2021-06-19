@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-center">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> Profil Photografer</div>
                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ asset('images/default1.jpg') }}"
                            class="rounded rounded-circle img-thumbnail img-fluid" alt="..." width="170">
                        <div>
                            <h5 class="mt-2">{{ $user->name }}</h5>
                        </div>
                    </div>
                    <hr>
                    {{-- <a href="#">Project Gallery</a>
                    <hr>
                    <a href="#">Album</a> --}}
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-gallery-tab" data-toggle="pill" href="#v-pills-gallery"
                            role="tab" aria-controls="v-pills-gallery" aria-selected="true">Project Gallery</a>
                        <a class="nav-link" id="v-pills-album-tab" data-toggle="pill" href="#v-pills-album" role="tab"
                            aria-controls="v-pills-album" aria-selected="false">Album</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="card">
                <div class="card-body">
                    <div class="tab-pane fade show active" id="v-pills-gallery" role="tabpanel"
                        aria-labelledby="v-pills-gallery-tab">
                        Project Gallery
                    </div>
                    <div class="tab-pane fade" id="v-pills-album" role="tabpanel" aria-labelledby="v-pills-album-tab">
                        @include('photographers.album')

                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
