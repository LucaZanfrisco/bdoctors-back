@extends('layouts.app')

@section('content')
    <div class="login">
        <div class="w-25 text-center login-form-container">
            <div class="fs-3 fw-bold text-center mb-3">Accedi</div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>
                    <input id="email" type="email"
                        class="form-control text-center fw-bold @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    <div class="d-flex justify-content-between align-items-center">
                        <input id="password" type="password"
                            class="form-control text-center fw-bold @error('password') is-invalid @enderror" name="password"
                            required autocomplete="current-password"">
                        <span class="d-flex justify-content-center align-items-center" id="showPassword"><i
                                class="fa-solid fa-eye fs-4 password"></i></span>
                        <span class="d-flex justify-content-center align-items-center d-none" id="hidePassword"><i
                                class="fa-solid fa-eye-slash fs-4 password"></i></span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">

                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>

                </div>

                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>

            </form>
        </div>
    </div>
@endsection
