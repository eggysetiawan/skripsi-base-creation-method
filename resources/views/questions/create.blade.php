@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('questions.index') }}">Daftar Kuisioner</a></li>
    <li class="breadcrumb-item active">Tambah Kuisioner</li>

@endsection

@section('content')


    <div class="row justify-content-center">
        <div class="col-md-9">
            <x-alert-success />
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> Buat Kuisioner</div>
                <form action="{{ route('questions.store') }}" method="post">
                    @csrf
                    @include('questions.partials._form-control')
                </form>

            </div>
        </div>
    </div>


@endsection
