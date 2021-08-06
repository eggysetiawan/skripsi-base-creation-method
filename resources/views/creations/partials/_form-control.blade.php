<x-testing-user />
<div class="form-group">
    <label for="title">{{ __('Judul') }}</label>
    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') ?? $creation->title }}"
        placeholder="cth: Wedding Willy & Wendy">
    @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="category">{{ __('Kategori') }}</label>
    {{-- <input type="text" name="category" id="category" class="form-control"
        value="{{ old('category') ?? $creation->category }}" placeholder="cth: Wedding, Sport, Nature, Culture"> --}}

    <select name="category" id="category" class="form-control select2">
        <option value="">Pilih Kategori</option>

        @foreach ($categories as $category)
            <option value="{{ $category->category }}">{{ ucfirst($category->category) }}</option>
        @endforeach
    </select>
    @error('category')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="description">{{ __('Deskripsi') }}</label>
    <textarea name="description" id="description" class="form-control"
        placeholder="Pernikahan merupakan sebuah...">{{ old('description') ?? $creation->description }}</textarea>
    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
