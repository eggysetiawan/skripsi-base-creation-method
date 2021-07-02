@extends('layouts.app')
@section('breadcrumb')
    <li class="breadcrumb-item active">Edit Profile</li>
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card card-primary">
                <div class="card-header"><i class="cil-user"></i> Edit Profile</div>
                <livewire:profiles.edit :key="$user->id" :user="$user">
            </div>
        </div>
    </div>
@endsection
