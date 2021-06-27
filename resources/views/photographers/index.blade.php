@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active">Pilih Fotografer</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">Daftar Fotografer</div>

        <div class="card-body">
            <div class="row justify-content-start mb-2">
                @foreach ($photographers as $photographer)
                    <div class="col-md-4 mb-5 mt-2">
                        <div class="row">
                            <img src="{{ asset('images/default.png') }}" alt="{{ auth()->user()->name }}"
                                class="img-thumbnail mx-auto rounded-circle w-50" height="30">
                        </div>
                        <div class="row justify-content-center">
                            <a href="{{ route('photographer.show', $photographer->username) }}"
                                class="card-text text-muted stretched-link">
                                <h5>{{ ucfirst($photographer->name) }}</h5>
                            </a>
                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
