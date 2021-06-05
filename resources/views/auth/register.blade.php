@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mx-4">
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <h1>{{ __('Register') }}</h1>
                            <p class="text-muted">Create your account</p>

                            <div class="form-group">
                                <label for="role">Mendaftar Sebagai</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="photographer">Fotografer</option>
                                    <option value="customer">Customer</option>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="cil-user c-icon"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="text" placeholder="Nama Depan.." name="first_name"
                                    value="{{ old('first_name') }}">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="cil-user c-icon"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="text" placeholder="Nama Belakang.." name="last_name"
                                    value="{{ old('last_name') }}">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="cil-phone c-icon"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="number" min="0" placeholder="mobile" name="mobile"
                                    value="{{ old('mobile') }}">
                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <livewire:registers.username />


                        </form>

                        <div class="row justify-content-center mt-1">
                            <span>
                                <a href="{{ route('login') }}" class="btn btn-link px-0">Already have account? Sign
                                    In</a>
                            </span>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
