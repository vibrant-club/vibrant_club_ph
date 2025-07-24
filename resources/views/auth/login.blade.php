@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-4">

                    {{-- Header --}}
                    <div class="card-header text-white text-center rounded-top-4 py-3 fs-2 fw-semibold"
                        style="background-color: #ff0084;">
                        You're Almost There
                        <div class="fs-6 fw-normal mt-1" style="line-height: 1.2;">
                            Sign in to access exclusive campaigns and community perks.
                        </div>
                    </div>

                    {{-- Logo --}}
                    <div class="text-center">
                        <img src="{{ asset('images/logo2.png') }}" alt="Your Logo" class="img-fluid"
                            style="height: 300px; width: auto;">
                    </div>

                    {{-- Body --}}
                    <div class="card-body px-4 py-1 fs-5">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            {{-- Email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email"
                                    class="form-control rounded-pill @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control rounded-pill @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password">
                                @error('password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Remember Me --}}
                            <div class="mb-3 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            {{-- Submit --}}
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn rounded-pill py-2 fs-5 text-white"
                                    style="background-color: #ff0084; border: none;">
                                    {{ __('Login') }}
                                </button>
                            </div>

                            <div class="d-grid mb-3">
                                <a href="{{ route('register') }}" class="btn rounded-pill py-2 fs-5 text-white"
                                    style="background-color: #ff0084; border: none;">
                                    {{ __('Register') }}
                                </a>
                            </div>



                            {{-- Forgot Password --}}
                            {{-- @if (Route::has('password.request'))
                                <div class="text-center mb-3 fs-6">
                                    <a class="text-decoration-none" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            @endif --}}

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
