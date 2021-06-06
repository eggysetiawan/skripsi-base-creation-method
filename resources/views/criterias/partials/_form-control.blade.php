<div class="card-body">
    <div class="form-group">
        <label for="name">Nama Kriteria</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name') ?? $criteria->name }}" placeholder="Nama kriteria..">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="score">Nilai Kriteria</label>
        <input type="number" min="0" name="score" id="score" class="form-control @error('score') is-invalid @enderror"
            value="{{ old('score') ?? $criteria->score }}" placeholder="Nilai kriteria..">
        @error('score')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="card-footer">
    <button class="btn btn-success">{{ $submit ?? 'Update' }}</button>
</div>
