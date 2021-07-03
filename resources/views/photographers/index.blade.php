@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active">Pilih Fotografer</li>
@endsection

@section('content')
    <livewire:photographers.index />
@endsection
