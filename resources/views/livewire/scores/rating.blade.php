<div class="row justify-content-center">
    @foreach ($criterias as $criteria)
        <div class="form-group">
            <div class="col-md-12">
                <label
                    for="score.{{ $criteria->id }}">{{ ucfirst($criteria->name) . ' : ' . ${$criteria->name} }}</label>
                <input type="hidden" name="criterias[]" value="{{ $criteria->id }}">

                {{-- <input type="range" class="custom-range" name="score[{{ $criteria->id }}] "
                    id="score.{{ $criteria->id }}" min="1" step="2" max="1024" wire:model="{{ $criteria->name }}"> --}}
                <input type="number" name="score[{{ $criteria->id }}] " id="score.{{ $criteria->id }}"
                    class="form-control" wire:model="{{ $criteria->name }}">
            </div>
        </div>
    @endforeach
</div>
