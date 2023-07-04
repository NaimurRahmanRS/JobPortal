@extends('layouts.main')

@section('content')
    <section class="view-company">
        <h1 class="heading">{{ __('Verify Your Email Address') }}</h1>
        <div class="details">
            <div class="description">
                @if (session('resent'))
                    <div class="info" style="font-size: 1.5rem">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                <p>{{ __('If you did not receive the email') }}
                    <br><a style="font-size: 1.5rem" class="btn" href="{{ route('verification.resend') }}">
                        {{ __('click here to request another') }}</a></p>
            </div>
        </div>
    </section>
@endsection
