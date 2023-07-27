@extends('layouts.app')

@section('content')
<div class="reg_container">
    <div class="reg-box">
        <h2>{{ __('Register') }}</h2>
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <div>
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <label for="lastname">{{ __('Lastname') }}</label>
                    <input id="lastname" type="text" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
                    @error('lastname')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div>
                <div>
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <label for="birth_day">{{ __('Birth of day') }}</label>
                    <input id="birth_day" type="date" name="birth_day" value="{{ old('birth_day') }}" required autocomplete="birth_day" autofocus>
                    @error('birth_day')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div>
                <div>
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password"  name="password" required autocomplete="new-password">
                    @error('password')
                        <span role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div>
                <label for="InputFile">Immagine profilo</label>
                <input type="file" id="input_file" name="user_img">
            </div>

            <div id="button">
                <button type="submit">{{ __('Register') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
