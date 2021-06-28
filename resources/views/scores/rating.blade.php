@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('photographers.index') }}">Pilih Fotografer</a></li>
    <li class="breadcrumb-item active">{{ $user->name }}</li>
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> Daftar Kriteria</div>
                <div class="card-body">
                    {{-- form --}}
                </div>
            </div>
        </div>
    </div>


@endsection
