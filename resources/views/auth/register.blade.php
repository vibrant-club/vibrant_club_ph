@extends('layouts.app')

@section('content')
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-4">

                    <div class="card-header text-white text-center rounded-top-4 py-3 fs-2 fw-semibold"
                        style="background-color: #ff0084;">
                        Join our influencer network today!
                        <div class="fs-6 fw-normal mt-1" style="line-height: 1.2;">
                            Collaborate and grow your network with exclusive campaign opportunities and community perks.
                        </div>
                    </div>



                    <div class="text-center">

                        {{-- <img src="{{ asset('images/logo2.png') }}" alt="Your Logo" class="img-fluid" style="height: 200px; width: auto;"> --}}

                        <img src="{{ asset('images/logo2.png') }}" alt="Your Logo" class="img-fluid"
                            style="height: 300px; width: auto;">

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

                            {{-- Contact Number --}}
                            <div class="mb-2">
                                <label for="contact_number" class="form-label">{{ __('Contact Number') }}</label>
                                <input id="contact_number" type="text"
                                    class="form-control rounded-pill @error('contact_number') is-invalid @enderror"
                                    name="contact_number" value="{{ old('contact_number') }}" required>
                                @error('contact_number')
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
                            {{-- OLD CODE FOR INPUTTING REGISTRAION CODE --}}
                            <div class="mb-2">
                                <label for="registration_code_simple" class="form-label">Registration Code</label>
                                <input id="registration_code_simple" type="text"
                                    class="form-control rounded-pill @error('registration_code_simple') is-invalid @enderror"
                                    name="registration_code_simple" value="{{ old('registration_code_simple') }}" required>
                                @error('registration_code_simple')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Registration Code --}}
                            {{-- BEW FOR INPUTTING FREE-ACCESS --}}
                            {{-- <div class="mb-4">
                                <label for="registration_code_simple" class="form-label">Registration Code</label>
                                <input id="registration_code_simple" type="text"
                                    class="form-control rounded-pill @error('registration_code_simple') is-invalid @enderror"
                                    name="registration_code_display" value="FREE-ACCESS" disabled>
                                <input type="hidden" name="registration_code_simple" value="FREE-ACCESS">
                                @error('registration_code_simple')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div> --}}


                            {{-- Messenger help link --}}
                            <div class="mb-4 medium fst-italic">
                                <span>If you don’t have a registration code, message us on
                                    <a href="https://www.messenger.com/t/vibrant.club.ph" target="_blank"
                                        style="color:#ff0084; font-weight:bold;">
                                        Messenger
                                    </a>
                                </span>
                            </div>

                            {{-- Data Privacy --}}
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="privacyCheck" required>
                                <label class="form-check-label" for="privacyCheck">
                                    I agree to the <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#privacyModal">Data Privacy Policy</a>
                                </label>
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

    {{-- Data Privacy Modal --}}
    <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4 shadow-lg">
                <div class="modal-header" style="background-color:#ff0084; color:white;">
                    <h5 class="modal-title fw-bold" id="privacyModalLabel">Data Privacy Policy</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <p>We value your privacy and are committed to protecting your personal information. By registering with
                        Vibrant Club PH, you consent to the collection and use of your information solely for the purposes
                        of account creation, campaign opportunities, and community engagement.</p>

                    <p>Your information will not be shared with third parties without your consent, except when required by
                        law. For more details on how we protect your data, please review our full privacy practices on our
                        website.</p>

                    <p class="fw-semibold">By proceeding, you acknowledge that you have read and agree to our Data Privacy
                        Policy.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill px-4"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
