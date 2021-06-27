@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('questionnaires.index') }}">Kuisioner</a></li>
    <li class="breadcrumb-item active">{{ $questionnaire->question->question }}</li>
@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-9">
            <form action="{{ route('questionnaires.update', $questionnaire->id) }}" method="post">
                @csrf
                @method('patch')
                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i> Edit Kuisioner</div>
                    <div class="card-body">
                        <label for="answer">{{ $questionnaire->question->question }}</label>
                        <textarea name="answer" id="anser" class="form-control">{{ $questionnaire->answer }}</textarea>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
