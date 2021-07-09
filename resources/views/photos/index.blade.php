@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active">Photo</li>
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="text-center">
                <img src="{{ asset('images/logo.png') }}" class="img-fluid w-25" alt="">
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <blockquote class="blockquote text-center">
                <p class="mb-0">Disini adalah tempat nongkrongnya para fotografer mempromosikan karya,kualitas,dan jasa apa
                    saja
                    yang diberikan fotografer,
                    Website ini untuk membantu dan mempermudah orang-orang(customer) yang akan menggunakan jasa
                    photografi sesuai kriteria yang di inginkan pengguna jasa.</p>
                <footer class="blockquote-footer">KHONG GRAPHY </footer>
            </blockquote>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">

            <livewire:photos.index />
        </div>
    </div>


@endsection
