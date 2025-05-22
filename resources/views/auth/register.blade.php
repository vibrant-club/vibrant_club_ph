@extends('layouts.app')

@section('content')
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-4">

                    <div class="card-header text-white text-center rounded-top-4 py-3 fs-2 fw-semibold"
                        style="background-color: #ff0084;">
                        Join our influencer network today!
                        <div class="fs-4 fw-normal mt-1" style="line-height: 1.2;">
                            Collaborate and grow your network with exclusive campaign opportunities and community perks.
                        </div>
                    </div>



                    <div class="text-center">

                        {{-- <img src="{{ asset('images/logo2.png') }}" alt="Your Logo" class="img-fluid" style="height: 200px; width: auto;"> --}}

                        <img src="{{ asset('images/logo3.png') }}" alt="Your Logo" class="img-fluid"
                            style="height: 350px; width: 350px;">

                        {{-- <img src="{{ asset('images/logo.png') }}" alt="Your Logo" class="img-fluid" style="max-height: 200px;"> --}}
                    </div>

                    {{-- <hr> --}}

                    <div class="card-body px-4 py-1 fs-5">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- First Name --}}
                            <div class="mb-2">
                                <label for="firstname" class="form-label">{{ __('First Name') }}</label>
                                <input id="firstname" type="text"
                                    class="form-control rounded-pill @error('firstname') is-invalid @enderror"
                                    name="firstname" value="{{ old('firstname') }}" required>
                                @error('firstname')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Middle Name --}}
                            <div class="mb-2">
                                <label for="middlename" class="form-label">{{ __('Middle Name') }}</label>
                                <input id="middlename" type="text"
                                    class="form-control rounded-pill @error('middlename') is-invalid @enderror"
                                    name="middlename" value="{{ old('middlename') }}">
                                @error('middlename')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Last Name --}}
                            <div class="mb-2">
                                <label for="lastname" class="form-label">{{ __('Last Name') }}</label>
                                <input id="lastname" type="text"
                                    class="form-control rounded-pill @error('lastname') is-invalid @enderror"
                                    name="lastname" value="{{ old('lastname') }}" required>
                                @error('lastname')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="mb-2">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email"
                                    class="form-control rounded-pill @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="mb-2">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control rounded-pill @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password">
                                @error('password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Confirm Password --}}
                            <div class="mb-2">
                                <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control rounded-pill"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>

                            {{-- Registration Code --}}
                            <div class="mb-4">
                                <label for="registration_code_simple" class="form-label">Registration Code</label>
                                <input id="registration_code_simple" type="text"
                                    class="form-control rounded-pill @error('registration_code_simple') is-invalid @enderror"
                                    name="registration_code_simple" value="{{ old('registration_code_simple') }}" required>
                                @error('registration_code_simple')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Submit --}}
                            <div class="d-grid mb-4">
                                <button type="submit" class="btn rounded-pill py-2 fs-5 text-white"
                                    style="background-color: #ff0084; border: none; style="background-color: #ff0084;
                                    border: none;" onmouseover="this.style.backgroundColor='#e60076';"
                                    onmouseout="this.style.backgroundColor='#ff0084';">
                                    {{ __('Register') }}
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
