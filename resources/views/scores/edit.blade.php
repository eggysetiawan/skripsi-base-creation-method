@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('questions.index') }}">Pertanyaan & Table Kuisioner Fotografer</a></li>
    <li class="breadcrumb-item active">{{ $user->name }}</li>
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6" style="height: 100vh">

            <form action="{{ route('scores.update', $user->username) }}" method="post">
                @csrf
                @method('patch')
                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i> Penilaian Fotografer</div>
                    <div class="card-body">
                        <livewire:scores.edit :key="$user->id" :user="$user" />
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ $update ?? 'Submit' }}</button>
                    </div>

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
