@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow rounded-4 border-0">
                <div class="card-header text-white fw-bold rounded-top-4"
                    style="background-color: #FF0084;">
                    {{ __('Set a New Password') }}
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">{{ __('Email Address') }}</label>
                            <input id="email" type="email"
                                   class="form-control rounded-pill shadow-sm @error('email') is-invalid @enderror"
                                   name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback d-block mt-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">{{ __('New Password') }}</label>
                            <input id="password" type="password"
                                   class="form-control rounded-pill shadow-sm @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback d-block mt-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="form-label fw-semibold">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password"
                                   class="form-control rounded-pill shadow-sm"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn text-white px-4 py-2 rounded-pill"
                                    style="background-color: #FF0084; border: none;">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
