@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('questions.index') }}">Pertanyaan & Table Kuisioner Fotografer</a></li>
    <li class="breadcrumb-item active">{{ $user->name }}</li>
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">

            <form action="{{ route('scores.rating.store', $user->username) }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i> Penilaian Fotografer</div>
                    @include('scores.partials._form-control')
                </div>
            </form>
        </div>
        <div class="col-md-6" style="overflow-y: scroll;height:100vh">
            <div class="card">
                <div class="card-header">Kuisioner <strong>{{ $user->name }}</strong></div>
                <div class="card-body">

                    @foreach ($questionnaires as $questionnaire)
                        <dl class="row">
                            <dt class="ml-3">{{ $loop->iteration }}</dt>
                            <dt class="col-sm-8">{{ $questionnaire->question->question }}</dt>
                        </dl>
                        <dl class="row">
                            <dd class="col-sm-8">{{ $questionnaire->answer }}
                            </dd>
                        </dl>
                    @endforeach

                </div>
            </div>
        </div>
    </div>


@endsection
