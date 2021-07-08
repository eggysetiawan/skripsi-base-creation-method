<div>
    <form action="{{ route('registrations.store') }}" method="post" wire:submit.prevent="register">

        <h1>{{ __('Register') }}</h1>
        <p class="text-muted">Create your account</p>


        <div class="form-group">
            <label for="role">Mendaftar Sebagai</label>
            <select name="role" id="role" class="form-control" wire:model="role">
                <option value="photographer" selected>Fotografer</option>
                <option value="customer">Customer</option>
            </select>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fas fa-user"></i>
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
                    <i class="fas fa-user"></i>
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
                    <i class="fas fa-phone"></i>
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
                    <i class="fas fa-user"></i>
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
                    <i class="fas fa-envelope"></i>
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
                    <i class="fas fa-key"></i>
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
                    <i class="fas fa-key"></i>
                </span>
            </div>
            <input class="form-control" type="password" placeholder="Repeat password" name="password_confirmation"
                wire:model.debounce.500ms="password_confirmation">

        </div>

        <button class="btn btn-block btn-success" type="submit" @if ($errors->any()) disabled @endif>Create Account</button>

    </form>


    {{-- <form action="{{ route('registrations.store') }}" method="post" wire:submit.prevent="register">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Full name">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Retype password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                    <label for="agreeTerms">
                        I agree to the <a href="#">terms</a>
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
        </div>
    </form> --}}

</div>
