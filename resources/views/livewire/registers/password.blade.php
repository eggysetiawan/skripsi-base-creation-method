<div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="cil-lock-locked c-icon"></i>
            </span>
        </div>
        <input class="form-control" type="password" placeholder="Password" name="password"
            wire:model.debounce.500ms="password">

    </div>
    <div class="input-group mb-4">
        <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="cil-lock-locked c-icon"></i>
            </span>
        </div>
        <input class="form-control" type="password" placeholder="Repeat password" name="password_confirmation"
            wire:model.debounce.500ms="password_confirmation">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <button class="btn btn-block btn-success" type="submit" @if ($errors->any()) disabled @endif>Create Account</button>
</div>
