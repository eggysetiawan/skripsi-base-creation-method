<div>
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
        <input class="form-control @error('email') is-invalid @else is-valid @enderror" type="email" placeholder="Email"
            name="email" wire:model.debounce.500ms="email">
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
</div>
