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
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="cil-user c-icon"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="text" placeholder="Full name" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
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
                                <input class="form-control" type="text" placeholder="Username" name="username"
                                    value="{{ old('username') }}">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="cil-envelope-open c-icon"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="text" placeholder="Email" name="email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="cil-lock-locked c-icon"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="password" placeholder="Password" name="password">

                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="cil-lock-locked c-icon"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="password" placeholder="Repeat password"
                                    name="password_confirmation">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button class="btn btn-block btn-success" type="submit">Create Account</button>
                        </form>

                        <div class="row justify-content-center mt-1">
                            <span>
                                <a href="{{ route('login') }}" class="btn btn-link px-0">Already have account? Sign In</a>
                            </span>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
