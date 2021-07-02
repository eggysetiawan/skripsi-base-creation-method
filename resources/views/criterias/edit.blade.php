@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="{{ route('criterias.index') }}">Kriteria</a></li>
    <li class="breadcrumb-item active">Edit Kriteria</li>
@endsection


@section('content')

    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> Edit Kriteria</div>
                <div class="card-body">
                    <form action="{{ route('criterias.update', $criteria->slug) }}" method="post">
                        @csrf
                        @method('patch')
                        @include('criterias.partials._form-control')
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
