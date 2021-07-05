@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('photographers.index') }}">Pilih Fotografer</a></li>
    <li class="breadcrumb-item active">Tambah Foto</li>
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col md-10">
            <x-alert />
            <form action="{{ route('creations.update', $creation->id) }}" method="post" novalidate autocomplete="off">
                @csrf
                @method('patch')
                <div class="card">
                    <div class="card-body">
                        @include('creations.partials._form-control')
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>


        </div>
    </div>

    <div class="row justify-content-start">
        @foreach ($creation->getMedia('creation') as $img)
            <div class="col-md-4">
                <img src="{{ $img->getFullUrl() }}" class="img-thumbnail w-100" style="height:18rem" alt="">
            </div>
        @endforeach
    </div>
@endsection
