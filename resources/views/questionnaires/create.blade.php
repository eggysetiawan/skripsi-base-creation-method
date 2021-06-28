@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('questionnaires.index') }}">Table Kuisioner</a></li>
    <li class="breadcrumb-item active">Isi Kuisioner</li>
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> Isi Kuisioner</div>

                <form action="{{ route('questionnaires.store') }}" method="post">
                    @csrf
                    @include('questionnaires.partials._form-control', [
                    'update' => 'Update',
                    ])
                </form>

            </div>
        </div>
    </div>


@endsection
