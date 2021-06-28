@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item active">Isi Kuisioner</li>
@endsection

@section('content')

    <div class="d-flex justify-content-center">
        <div class="col-md-8">
            @if (!$questionnaireExist)
                <a href="{{ route('questionnaires.create') }}" class="btn btn-primary">Isi Kuisionser</a>
            @else
                <div class="card mt-2">
                    <div class="card-header">Kuisioner Anda</div>
                    <div class="card-body">

                        @foreach ($questionnaires as $questionnaire)
                            <dl class="row">
                                <dt class="col-sm-8">{{ $questionnaire->question->question }}</dt>
                            </dl>
                            <dl class="row">
                                <dd class="col-sm-8">{{ $questionnaire->answer }}
                                    <a href="{{ route('questionnaires.edit', $questionnaire->id) }}">
                                        Edit Jawaban
                                    </a>
                                </dd>
                            </dl>
                        @endforeach

                    </div>
                </div>
            @endif
        </div>


    @endsection
