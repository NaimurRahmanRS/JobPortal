@extends('layouts.main')

@section('content')
    <div class="account-form-container">
        <section class="account-form">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h3>create new Seeker account</h3>
                <input type="hidden" value="seeker" name="user_type">
                <input id="name" placeholder="enter your name" type="text"
                       class="input @error('name') is-invalid @enderror"
                       name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

                <input id="email" placeholder="enter your email" type="email"
                       class="input @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <label style="text-align: left; display: block; font-size: 1.5rem;">Date of Birth</label>
                <input id="dob" placeholder="enter your date of birth" type="date"
                       class="input @error('dob') is-invalid @enderror" name="dob"
                       value="{{ old('dob') }}" required autocomplete="dob">

                @error('dob')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror

                <label style="text-align: left; display: block; font-size: 1.5rem;">Gender</label>
                <div class="input" style="text-align: left; display: block;">

                    <input type="radio" value="male" name="gender" required> &nbsp; Male
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    <input type="radio" value="female" name="gender"> &nbsp; Female

                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>


                <input id="password" type="password" placeholder="enter your password"
                       class="input @error('password') is-invalid @enderror" name="password" required
                       autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror


                <input id="password-confirm" type="password" placeholder="confirm your password" class="input"
                       name="password_confirmation"
                       required autocomplete="new-password">


                        <button type="submit" class="btn">
                            {{ __('Register') }}
                        </button>
            </form>
        </section>
    </div>
@endsection
