<div class="row justify-content-center">
    @foreach ($criterias as $criteria)
        <div class="form-group">
            <div class="col-md-12">
                <label for="score.{{ $criteria->id }}">{{ $criteria->name . ' : ' . ${$criteria->name} }}</label>
                <input type="hidden" name="criterias[]" value="{{ $criteria->id }}">

                <input type="range" class="custom-range" name="score[{{ $criteria->id }}] "
                    id="score.{{ $criteria->id }}" min="0" max="5" wire:model="{{ $criteria->name }}">
            </div>
        </div>
    @endforeach
</div>
