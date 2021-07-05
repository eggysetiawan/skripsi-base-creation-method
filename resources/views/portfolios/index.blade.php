@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mb-4">
        <a href="{{ route('creations.create') }}">Tambah Album</a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mb-3">
                <div class="card-header"><i class="cil-user"></i> Portfolio</div>

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    @php
                        $i = 0;
                    @endphp
                    <div class="carousel-inner">
                        @foreach ($creations as $creation)
                            @php $i++;@endphp
                            <div class="carousel-item {{ $i == '1' ? 'active' : '' }}">
                                <img src="{{ $creation->getFirstMediaUrl('creation', 'thumb') }}" class="d-block w-100"
                                    alt="{{ $creation->title }}">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ $creation->title }}</h5>
                                    <p>{{ $creation->description }}.</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="card-body">
                    {{-- <h5 class="card-title"></h5> --}}
                    <p class="card-text">{{ auth()->user()->bio }}.</p>
                    {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                </div>
            </div>
            <livewire:photographers.album :key="$user->id" :user="$user" />
        </div>
    </div>
    <script>
        $('.carousel').carousel({
            interval: 5000
        })
    </script>
@endsection
