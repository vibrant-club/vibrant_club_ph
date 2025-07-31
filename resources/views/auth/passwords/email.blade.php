@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow rounded-4 border-0">
                    <div class="card-header text-white fw-bold rounded-top-4" style="background-color: #FF0084;">
                        {{ __('Reset Your Password') }}
                    </div>

                    <div class="card-body p-4">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <p class="text-muted mb-4">
                            Forgot your password? Enter your email address below and we’ll send you a link to reset it.
                            <br>
                            <span class="fw-bold text-danger">Note: Please check in the spam message</span>
                        </p>


                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">{{ __('Email Address') }}</label>
                                <input id="email" type="email"
                                    class="form-control rounded-pill shadow-sm @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback d-block mt-1" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mt-4 text-end">
                                <button type="submit" class="btn text-white px-4 py-2 rounded-pill"
                                    style="background-color: #FF0084; border: none;">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
