@extends('layouts.app')

@section('content')
    <div class="container py-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-4">

                    <div class="card-header text-white text-center rounded-top-4 py-3 fs-2 fw-semibold"
                        style="background-color: #ff0084;">
                        Welcome Vibrants 🌟
                        <div class="fs-6 fw-normal mt-1" style="line-height: 1.2;">
                            Rise, connect and succeed with exclusive brand campaigns, x-deals, and collaboration
                            opportunities with us
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

                            {{-- BASIC INFORMATION BOX --}}
                            <div class="p-3 mb-4 rounded-4 shadow-sm" style="border: 2px solid #ff0084;">

                                <div class="mb-3 text-center">
                                    <h5 class="fw-bold mb-0" style="color:#ff0084;">BASIC INFORMATION</h5>
                                </div>



                                {{-- First Name --}}
                                <div class="mb-2">
                                    <label for="firstname" class="form-label">First Name</label>
                                    <input id="firstname" type="text"
                                        class="form-control rounded-pill @error('firstname') is-invalid @enderror"
                                        name="firstname" value="{{ old('firstname') }}" required>
                                    @error('firstname')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Middle Name --}}
                                <div class="mb-2">
                                    <label for="middlename" class="form-label">Middle Name</label>
                                    <input id="middlename" type="text"
                                        class="form-control rounded-pill @error('middlename') is-invalid @enderror"
                                        name="middlename" value="{{ old('middlename') }}">
                                    @error('middlename')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Last Name --}}
                                <div class="mb-2">
                                    <label for="lastname" class="form-label">Last Name</label>
                                    <input id="lastname" type="text"
                                        class="form-control rounded-pill @error('lastname') is-invalid @enderror"
                                        name="lastname" value="{{ old('lastname') }}" required>
                                    @error('lastname')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Contact Number --}}
                                <div class="mb-2">
                                    <label for="contact_number" class="form-label">Contact Number</label>
                                    <input id="contact_number" type="text"
                                        class="form-control rounded-pill @error('contact_number') is-invalid @enderror"
                                        name="contact_number" value="{{ old('contact_number') }}" required>
                                    @error('contact_number')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            {{-- LOGIN CREDENTIALS BOX --}}
                            <div class="p-3 mb-4 rounded-4 shadow-sm" style="border: 2px solid #ff0084;">

                                <div class="mb-3 text-center">
                                    <h5 class="fw-bold mb-0" style="color:#ff0084;">LOGIN CREDENTIALS</h5>
                                </div>

                                {{-- Email --}}
                                <div class="mb-2">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input id="email" type="email"
                                        class="form-control rounded-pill @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Password --}}
                                <div class="mb-2">
                                    <label for="password" class="form-label">Password</label>
                                    <input id="password" type="password"
                                        class="form-control rounded-pill @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="new-password">
                                    @error('password')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Confirm Password --}}
                                <div class="mb-2">
                                    <label for="password-confirm" class="form-label">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control rounded-pill"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>


                            {{-- REGISTRATION DETAILS BOX --}}
                            <div class="p-3 mb-4 rounded-4 shadow-sm" style="border: 2px solid #ff0084;">

                                <div class="mb-3 text-center">
                                    <h5 class="fw-bold mb-0" style="color:#ff0084;">REGISTRATION DETAILS</h5>
                                </div>

                                {{-- REFERRAL CODE --}}
                                <div class="mb-2">
                                    <label for="referral_code" class="form-label">Referral Code</label>
                                    <div class="input-group">
                                        <input id="referral_code" type="text" class="form-control rounded-pill"
                                            name="referral_code" value="{{ request('ref') }}" required>
                                        <div class="input-group-text bg-white border-0">
                                            <input type="checkbox" id="referral_na" class="form-check-input ms-2">
                                            <label for="referral_na" class="ms-1 mb-0">N/A</label>
                                        </div>
                                    </div>
                                </div>


                                {{-- Registration Code --}}
                                {{-- OLD CODE FOR INPUTTING REGISTRATION CODE --}}
                                <div class="mb-4">
                                    <label for="registration_code_simple" class="form-label">Registration Code</label>
                                    <input id="registration_code_simple" type="text"
                                        class="form-control rounded-pill @error('registration_code_simple') is-invalid @enderror"
                                        name="registration_code_simple" value="{{ old('registration_code_simple') }}"
                                        required>
                                    @error('registration_code_simple')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Registration Code --}}
                                {{-- NEW CODE FOR INPUTTING FREE-ACCESS --}}
                                {{-- 
                                <div class="mb-4">
                                    <label for="registration_code_simple" class="form-label">Registration Code</label>
                                    <input id="registration_code_simple" type="text"
                                        class="form-control rounded-pill @error('registration_code_simple') is-invalid @enderror"
                                        name="registration_code_display" value="FREE-ACCESS" disabled>
                                    <input type="hidden" name="registration_code_simple" value="FREE-ACCESS">
                                    @error('registration_code_simple')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                --}}

                                {{-- Messenger Help --}}
                                <div class="mb-3 fst-italic small">
                                    If you don’t have a registration code, message us on
                                    <a href="https://www.messenger.com/t/vibrant.club.ph" target="_blank"
                                        style="color:#ff0084; font-weight:bold;">Messenger</a>
                                </div>

                            </div>


                            {{-- Data Privacy --}}
                            <div class="form-check mb-3 fst-italic small">
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

                            {{-- Back to Login --}}
                            <div class="d-grid mb-4">
                                <a href="{{ route('login') }}" class="btn rounded-pill py-2 fs-5 text-white text-center"
                                    style="background-color: #ff0084; border: none;"
                                    onmouseover="this.style.backgroundColor='#e60076';"
                                    onmouseout="this.style.backgroundColor='#ff0084';">
                                    ← Back to Login
                                </a>
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



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const referralInput = document.getElementById("referral_code");
            const referralCheckbox = document.getElementById("referral_na");

            referralCheckbox.addEventListener("change", function() {
                if (this.checked) {
                    referralInput.value = "";
                    referralInput.removeAttribute("required");
                    referralInput.setAttribute("disabled", "disabled");
                } else {
                    referralInput.setAttribute("required", "required");
                    referralInput.removeAttribute("disabled");
                }
            });
        });
    </script>
@endsection
