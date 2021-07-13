@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active">Find Fotografer</li>
@endsection

@section('content')
<style>
    .criteria:out-of-range{
    border-color: #dc3545;
    padding-right: 2.25rem;
    background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='none' stroke='%23dc3545' viewBox='0 0 12 12'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e);
    background-repeat: no-repeat;
    background-position: right calc(.375em + .1875rem) center;
    background-size: calc(.75em + .375rem) calc(.75em + .375rem);
    }
</style>

    <livewire:photographers.find />

@endsection
