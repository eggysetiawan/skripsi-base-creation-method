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
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama Kriteria</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name') ?? $criteria->name }}" placeholder="Nama kriteria..">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <livewire:criterias.edit.score :key="$criteria->id" :criteria="$criteria" />
                        </div>


                        <div class="card-footer">
                            <button class="btn btn-success">{{ $submit ?? 'Update' }}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
