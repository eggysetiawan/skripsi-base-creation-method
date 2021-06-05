<div>
    <form action="{{ route('registrations.store') }}" method="post" wire:submit.prevent="register">

        <h1>{{ __('Register') }}</h1>
        <p class="text-muted">Create your account</p>

        <div class="form-group">
            <label for="role">Mendaftar Sebagai</label>
            <select name="role" id="role" class="form-control" wire:model="role">
                <option value="photographer">Fotografer</option>
                <option value="customer">Customer</option>
            </select>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="cil-user c-icon"></i>
                </span>
            </div>
            <input class="form-control" type="text" placeholder="Nama Depan.." name="first_name"
                value="{{ old('first_name') }}" wire:model="first_name">
            @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="cil-user c-icon"></i>
                </span>
            </div>
            <input class="form-control" type="text" placeholder="Nama Belakang.." name="last_name"
                wire:model="last_name">
            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="cil-phone c-icon"></i>
                </span>
            </div>
            <input class="form-control" type="number" min="0" placeholder="mobile" name="mobile"
                wire:model.debounce.500ms="mobile">
            @error('mobile')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="cil-user c-icon"></i>
                </span>
            </div>
            <input class="form-control @error('username') is-invalid @else is-valid @enderror" type="text"
                placeholder="Username" name="username" wire:model.debounce.500ms="username">
            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="cil-envelope-open c-icon"></i>
                </span>
            </div>
            <input class="form-control @error('email') is-invalid @else is-valid @enderror" type="email"
                placeholder="Email" name="email" wire:model.debounce.500ms="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="cil-lock-locked c-icon"></i>
                </span>
            </div>
            <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Password"
                name="password" wire:model.debounce.500ms="password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="cil-lock-locked c-icon"></i>
                </span>
            </div>
            <input class="form-control" type="password" placeholder="Repeat password" name="password_confirmation"
                wire:model.debounce.500ms="password_confirmation">

        </div>

        <button class="btn btn-block btn-success" type="submit" @if ($errors->any()) disabled @endif>Create Account</button>

    </form>
</div>
