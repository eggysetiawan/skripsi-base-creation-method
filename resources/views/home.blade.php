@extends('layouts.app')

@section('content')
    <div class="row justify-content-center align-items-center mb-4">
        <div class="col-md-11">
            <a href="{{ route('creations.create') }}" class="btn btn-info  btn-lg btn-block">Gallery <span
                    class="cil-plus btn-icon"></span></a>
        </div>
    </div>

        @include('photographers.album')
    @endsection
