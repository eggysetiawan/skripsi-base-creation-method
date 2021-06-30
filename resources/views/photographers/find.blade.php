@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active">Find Fotografer</li>
@endsection

@section('content')

    <livewire:photographers.find />

@endsection
