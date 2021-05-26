@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card card-teal">
                <div class="card-header"><i class="cil-user"></i> Edit Profile</div>
                <livewire:profiles.edit :key="$user->id" :user="$user">
            </div>
        </div>
    </div>
@endsection
