@extends('layouts.main')

@section('content')
    <div class="account-form-container">
        <section class="account-form">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <h3>{{ __('Reset Password') }}</h3>
                <input type="hidden" name="token" value="{{ $token }}">

                <label for="email"
                       style="text-align: left; display: block; font-size: 1.5rem;">{{ __('E-Mail Address') }}</label>

                <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email"
                       value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <label for="password"
                       style="text-align: left; display: block; font-size: 1.5rem;">{{ __('Password') }}</label>

                <input id="password" type="password" class="input @error('password') is-invalid @enderror"
                       name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror


                <label for="password-confirm"
                       style="text-align: left; display: block; font-size: 1.5rem;">{{ __('Confirm Password') }}</label>


                <input id="password-confirm" type="password" class="input" name="password_confirmation" required
                       autocomplete="new-password">


                <button type="submit" class="btn">
                    {{ __('Reset Password') }}
                </button>

            </form>
        </section>
    </div>
@endsection
