<div class="card-body">
    <div class="form-group">
        <label for="question">Pertanyaan</label>
        <textarea name="question" id="question" class="form-control"
            placeholder="Tuliskan pertanyaan disini..">{{ old('question') ?? $question->question }}</textarea>
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $update ?? 'Buat' }}</button>
</div>
