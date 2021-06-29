@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mb-3">
                <div class="card-header"><i class="cil-user"></i> Portfolio</div>

                <img src="{{ asset('images/sample7.jpg') }}" alt="" class="card-img-top" width="100%" role="img">

                <div class="card-body">
                    {{-- <h5 class="card-title"></h5> --}}
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab provident fugiat
                        laudantium ex, sit a cum earum porro consequuntur repellat blanditiis odit quo autem incidunt ad
                        impedit, quam inventore nihil tenetur atque! Eveniet, impedit officiis fugit omnis ipsa nisi illum
                        itaque pariatur quidem unde rerum maiores veniam cupiditate nam in!.</p>
                    {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                </div>
            </div>
            <livewire:photographers.album :key="$user->id" :user="$user" />
        </div>
    </div>
@endsection
