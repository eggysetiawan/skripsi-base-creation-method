@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active">Photo</li>
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> Semua Foto</div>
                <div class="card-body">
                    <livewire:photos.index />
                </div>
            </div>
        </div>
    </div>


@endsection
