@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('photographers.index') }}">Pilih Fotografer</a></li>
    <li class="breadcrumb-item active">{{ $user->name }}</li>
@endsection

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
                        <a href=" {{ route('creations.create') }}" class="nav-link" aria-controls=" v-pills-gallery"
                            aria-selected="true">Tambah Gallery
                        </a>
                        <hr>
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

                        <div class="row justify-content-start">
                            @foreach ($projects as $project)
                                <div class="col-md-4">
                                    <div class="card" style="width: 18rem;">
                                        <img src="{{ asset($project->getFirstMediaUrl('creation')) }}"
                                            class="card-img-top  img-fluid" alt="{{ $project->slug }}" height="200"
                                            style="object-fit: cover;">

                                        <div class="card-body">
                                            <a class="card-text stretched-link display-4"
                                                href="{{ route('creations.show', $project->slug) }}">
                                                <blockquote class="blockquote text-center">
                                                    <p class="mb-0">{{ Str::limit($project->description, 25, '...') }}</p>
                                                    <footer class="blockquote-footer">
                                                        {{ $project->title }}
                                                    </footer>
                                                </blockquote>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="tab-pane fade" id="v-pills-album" role="tabpanel" aria-labelledby="v-pills-album-tab">
                        @include('photographers.album')

                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
