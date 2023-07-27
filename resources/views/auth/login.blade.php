@extends('layouts.app')

@section('title', 'BoolBnB | Log In')

@section('content')
<div class="main_container login_box">

    <div class="auth_content">
        {{-- TITOLO FORM LOGIN --}}
        <h2>{{ __('Login') }}</h2>

        <div class="auth_box">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row">
                    <label for="email">{{ __('E-Mail Address') }}</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <label for="password">{{ __('Password') }}</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                
                <div class="row">
                    <div class="form-check">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                        <label for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="row">
                    @if (Route::has('password.request'))
                        <a class="forgot" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
