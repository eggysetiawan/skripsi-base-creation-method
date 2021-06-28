<div class="card-body">
    <div class="row justify-content-center">
        @foreach ($criterias as $criteria)
            <div class="form-group">
                <div class="col-md-6">
                    <label for="score.{{ $criteria->id }}">{{ $criteria->name }}</label>
                    <input type="hidden" name="criterias[]" value="{{ $criteria->id }}">
                    <input type="number" class="form-control" name="score[{{ $criteria->id }}] "
                        id="score.{{ $criteria->id }}" min="0">
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $update ?? 'Submit' }}</button>
</div>
