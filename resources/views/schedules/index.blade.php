@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active">Jadwal</li>
@endsection

@section('content')
    <x-alert />
    <livewire:schedules.index />
@endsection
