@extends('layouts.main')

@section('content')
    <div class="account-form-container">
        <section class="account-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf


                <input id="email" type="email" placeholder="enter your email"
                       class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                       required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror


                <input id="password" type="password" placeholder="enter you password"
                       class="input @error('password') is-invalid @enderror" name="password" required
                       autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror


                <div style="font-size: 1.5rem; text-align:left; display: block;"><br>
                    <input class="form-check-input" type="checkbox" name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <br>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <button type="submit" class="btn">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <div>
                        @if (Route::has('password.request'))
                            <a class="btn" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
