@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>

@endsection
@section('content')
    @include('layouts.partials._add-album')

    <div class="row justify-content-center mb-4">
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
    </div>


    <div class="row justify-content-start">
        @foreach ($projects as $project)
            <div class="col-md-4">
                <div class="card" style="width: 18rem;height:25rem">
                    <img src="{{ asset($project->getFirstMediaUrl('creation')) }}" class="card-img-top img-fluid"
                        alt="{{ $project->slug }}" height="200" style="object-fit: cover;">
                    @if ($project->user_id == auth()->id())
                        <div class="card-img-overlay text-right pt-0 pr-0">
                            <a href="{{ route('creations.edit', $project->id) }}">Edit</a>
                            <form class="form-inline d-inline" action="{{ route('creations.destroy', $project->id) }}"
                                method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-link" type="submit"
                                    onclick="return confirm('Are you sure want to delete this album?')">Hapus</button>
                            </form>
                        </div>
                    @endif

                    <div class="card-body">
                        <a class="card-text display-4" href="#!">
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
@endsection
