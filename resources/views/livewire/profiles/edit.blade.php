<div>
    <form action="{{ route('profiles.update', auth()->user()->username) }}" method="POST" autocomplete="off">
        @csrf
        @method('patch')
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="brand">Nama Brand</label>
                        <input type="text" name="brand" id="brand"
                            class="form-control @error('brand') is-invalid @else is-valid @enderror"
                            placeholder="Input nama brand.." wire:model.debounce.500ms="brand">
                        @error('brand')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username"
                            class="form-control @error('username') is-invalid @enderror"
                            value="{{ old('username') ?? $user->username }}" wire:model.debounce.500ms="username">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ old('email') ?? $user->email }}" wire:model.debounce.500ms="email">
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="first_name">Nama Depan</label>
                        <input type="text" name="first_name" id="first_name"
                            class="form-control @error('first_name') is-invalid @enderror"
                            value="{{ old('first_name') ?? $user->first_name }}" placeholder="Input nama depan.."
                            wire:model.debounce.500ms="first_name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="last_name">Nama Belakang</label>
                        <input type="text" name="last_name" id="last_name" class="form-control"
                            value="{{ old('last_name') ?? $user->last_name }}" placeholder="Input nama belakang.."
                            wire:model.debounce.500ms="last_name">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mobile">No Hp</label>
                        <input type="number" name="mobile" id="mobile"
                            class="form-control @error('brand') is-invalid @else is-valid @enderror"
                            value="{{ old('mobile') ?? $user->mobile }}" placeholder="cth: 08584294"
                            wire:model.debounce.500ms="mobile">
                        @error('brand')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bio">Biografi</label>
                        <input type="text" name="bio" id="bio" class="form-control"
                            value="{{ old('bio') ?? $user->bio }}" wire:model.debounce.500ms="bio">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary" @if (!$errors->isEmpty()) disabled @endif>Update Profile</button>
        </div>
    </form>
</div>
