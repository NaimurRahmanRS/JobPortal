@extends('layouts.main')

@section('content')
    <div class="account-form-container">
        <section class="account-form">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <h3>{{ __('Reset Password') }}</h3>
                <label style="text-align: left; display: block; font-size: 1.5rem;"
                       for="email">{{ __('E-Mail Address') }}</label>

                <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <button type="submit" class="btn">
                    {{ __('Send Password Reset Link') }}
                </button><br><br>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </form>
        </section>
    </div>
@endsection
