<div class="form-group">
    <label for="score">Nilai Kriteria : {{ $score }}</label>
    {{-- <input type="number" min="0" name="score" id="score" class="form-control @error('score') is-invalid @enderror"
        value="{{ old('score') ?? $criteria->score }}" placeholder="Nilai kriteria.."> --}}
    <input type="range" name="score" id="score" min="0" max="5" class="custom-range" wire:model.debounce.500ms="score">
    @error('score')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
