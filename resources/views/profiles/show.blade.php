@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <img src="{{ asset('images/default2.jpg') }}" class="img-thumbnail rounded-circle"
                            alt="{{ auth()->user()->name . ' display picture' }}" width="120">
                    </div>
                    <div class="row justify-content-center mt-2">
                        <span class="font-weight-bold">{{ auth()->user()->name }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Biografi Fotografer</div>
                <div class="card-body">
                    <div class="row">
                        @for ($i = 1; $i <= 12; $i++)
                            <div class="col-md-3">
                                <img src="{{ asset('images/project.png') }}" class="img-thumbnail rounded-circle mb-2"
                                    alt="{{ auth()->user()->name . ' display picture' }}" width="100">
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
