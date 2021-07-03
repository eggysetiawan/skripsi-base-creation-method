<div class="row justify-content-center">
    @foreach ($scores as $score)
        <div class="form-group">
            <div class="col-md-12">
                <label
                    for="score.{{ $score->criteria->id }}">{{ ucfirst($score->criteria->name) . ' : ' . ${$score->criteria->name} }}</label>
                <input type="range" class="custom-range" name="score[{{ $score->id }}] "
                    id="score.{{ $score->id }}" min="0" max="5" value="{{ $score->score }}"
                    wire:model="{{ $score->criteria->name }}">
            </div>
        </div>
    @endforeach
</div>
