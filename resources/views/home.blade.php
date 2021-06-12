@extends('layouts.app')

@section('content')
    <div class="row justify-content-center align-items-center mb-4">
        <div class="col-md-11">
            <a href="{{ route('creations.create') }}" class="btn btn-info  btn-lg btn-block">Gallery <span
                    class="cil-plus btn-icon"></span></a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="row" data-aos="fade-up" data-aos-delay="200">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul>
                    <li data-filter="*">All</li>

                    <li data-filter=".filter-wedding">Wedding</li>
                    {{-- <li data-filter=".filter-wedding">Wedding</li>
                    <li data-filter=".filter-wedding">Wedding</li>
                    <li data-filter=".filter-wedding">Wedding</li> --}}
                </ul>
            </div>
        </div>
        @include('photographers.album')
    @endsection
