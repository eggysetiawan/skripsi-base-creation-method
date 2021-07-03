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
    <livewire:criterias.create.score />
</div>


<div class="card-footer">
    <button class="btn btn-success">{{ $submit ?? 'Update' }}</button>
</div>
