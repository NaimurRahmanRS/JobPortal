@extends('layouts.main')

@section('content')
    <div class="account-form-container">
        <section class="account-form">

            <form method="POST" action="{{ route('employer.store') }}">

                @csrf
                <h3>create new employer account</h3>
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                <input type="hidden" value="employer" name="user_type">

                        <input id="cname" type="text" placeholder="enter company name" class="input @error('name') is-invalid @enderror"
                               name="cname" value="{{ old('cname') }}" required autocomplete="cname" autofocus>

                        @error('cname')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror


                        <input id="email" type="email" placeholder="enter company email address" class="input @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror



                        <input id="password" placeholder="enter company password" type="password"
                               class="input @error('password') is-invalid @enderror" name="password" required
                               autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror



                        <input id="password-confirm" placeholder="confirm company password" type="password" class="input" name="password_confirmation"
                               required autocomplete="new-password">


                        <button type="submit" class="btn">
                            {{ __('Register') }}
                        </button>
            </form>
        </section>
    </div>
@endsection
