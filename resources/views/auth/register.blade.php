@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mx-4">
                    <div class="card-body p-4">
                        <livewire:registers.username />
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
