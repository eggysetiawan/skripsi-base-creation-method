@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-9">

            <div class="card">
                <div class="card-header"><i class="fa fa-align-justify"></i> Buat Kriteria</div>
                <form action="{{ route('criterias.store') }}" method="post">
                    @csrf
                    @include('criterias.partials._form-control', ['submit' => 'Create',])
                </form>
            </div>
        </div>
    </div>


@endsection
