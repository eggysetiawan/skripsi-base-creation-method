<div class="card-body">

    @foreach ($questions as $question)
        <input type="hidden" name="questions[]" value="{{ $question->id }}">
        <div class="form-group">
            <label for="response">{{ $question->question }}</label>
            <textarea name="answers[{{ $question->id }}]" id="response{{ $question->id }}"
                class="form-control">{{ old('answers.' . $question->id) ?? $question->answer }}</textarea>
        </div>

    @endforeach

</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $update ?? 'Submit' }}</button>
</div>
