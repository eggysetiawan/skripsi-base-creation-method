@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col md-10">
            <x-alert />
            <form action="{{ route('creations.store') }}" method="post" enctype="multipart/form-data" novalidate
                autocomplete="off">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <x-testing-user />
                        <div class="form-group">
                            <label for="title">{{ __('Judul') }}</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}"
                                placeholder="cth: Wedding Willy & Wendy">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">{{ __('Kategori') }}</label>
                            <input type="text" name="category" id="category" class="form-control"
                                value="{{ old('category') }}" placeholder="cth: Wedding, Sport, Nature, Culture">
                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">{{ __('Deskripsi') }}</label>
                            <textarea name="description" id="description" class="form-control"
                                placeholder="Pernikahan merupakan sebuah..."></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="photos">{{ __('Foto') }}</label>
                            <input type="file" name="photos[]" multiple id="photos" class="form-control-file"
                                accept=".jpeg,.jpg,.png">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
