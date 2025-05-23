<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vibrant Club PH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #fff0f6;
        }

        .hero {
            background-color: #ff0084;
            color: white;
            padding: 4rem 2rem;
            border-radius: 0 0 40px 40px;
            text-align: center;
        }

        .hero img {
            height: 150px;
        }

        .section-title {
            font-weight: 700;
            color: #ff0084;
        }

        .announcement-card {
            background-color: #ffe0f0;
            border-left: 5px solid #ff0084;
        }
    </style>
</head>

<body>
    <div class="hero">
        {{-- <img src="{{ asset('images/logo3.png') }}" alt="Vibrant Club PH Logo" class="mb-3"> --}}
        <h1 class="display-5 fw-bold">Welcome to Vibrant Club PH</h1>
        <p class="lead">Where influencers rise, connect, and thrive.</p>
        <a href="{{ route('login') }}" class="btn btn-light rounded-pill px-4 py-2 fw-semibold">Login Account</a>
        {{-- <a href="{{ route('register') }}" class="btn btn-light rounded-pill px-4 py-2 fw-semibold">Register Account</a> --}}
    </div>

    <div class="container mt-4">
        <h2 class="section-title text-center mb-4">📢 Announcements</h2>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card announcement-card shadow-sm p-4">
                    <h5 class="mb-3">Get FREE Access to Vibrant Club PH – Starting June 15! ✨</h5>
                    <p>
                        We’re excited to celebrate a major milestone — the growth of <strong>Vibrant Club PH</strong>
                        has been incredible, thanks to the amazing energy of the Filipino influencer community. As a
                        heartfelt <em>thank you</em>, we’re opening our doors in a big way.
                    </p>
                    <p>
                        Starting <strong>June 15</strong>, we’re offering <strong>FREE exclusive access</strong> to the
                        first <strong>100 Filipino influencers</strong>. This is your opportunity to be part of
                        something exciting — and it all starts by joining our waitlist.
                    </p>
                    <p>
                        Please note that this is a waitlist. Signing up does not guarantee access. Selected influencers
                        will be notified via email with the next steps.
                    </p>
                    <p>
                        Be part of a vibrant space built for creators — where collaboration is encouraged, creativity
                        shines, and your influence can grow like never before.
                    </p>
                    <p>
                        🌟 Don’t miss your chance to help shape the future of influencer culture in the Philippines.
                    </p>
                    <p>
                        <strong>Sign up. Watch your inbox. Shine with Vibrant Club PH.</strong>
                    </p>
                    <p class="mb-0">
                        👉 <a
                            href="https://docs.google.com/forms/d/e/1FAIpQLSegNX6ly7_34fGNcgb5upPZAPwaMxzd79ZBoagr9poGd7FfVQ/viewform?usp=dialog"
                            target="_blank"><strong>Click here to join the waitlist</strong></a>
                    </p>
                </div>
            </div>
        </div>

        <h2 class="section-title text-center mb-4">📸 Featured Creators</h2>
        <div class="row text-center">
            <div class="col-md-4 text-center py-3 border">
                <img src="{{ asset('images/logo2.png') }}" class="img-fluid rounded-circle mb-3"
                    style="max-width: 200px; aspect-ratio: 1 / 1; object-fit: cover;" alt="Vibrant Club Profile">

                <h5 class="fw-bold mb-1" style="font-size: 1.1rem;">VIBRANT CLUB PH</h5>
                <p class="text-muted mb-3" style="font-size: 0.95rem;">Networking and Vlogging Company</p>

                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-tiktok me-2"></i>
                    <a href="https://www.tiktok.com/vibrant.club.ph" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        vibrant.club.ph
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-facebook me-2 text-primary"></i>
                    <a href="https://www.facebook.com/vibrant.club.ph" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        vibrant.club.ph
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-instagram me-2" style="color: #C13584;"></i>
                    <a href="https://www.instagram.com/vibrant.club.ph" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        vibrant.club.ph
                    </a>
                </h5>
            </div>

            <div class="col-md-4 text-center py-3 border">
                <img src="{{ asset('images/logo2.png') }}" class="img-fluid rounded-circle mb-3"
                    style="max-width: 200px; aspect-ratio: 1 / 1; object-fit: cover;" alt="Vibrant Club Profile">

                <h5 class="fw-bold mb-1" style="font-size: 1.1rem;">VIBRANT CLUB PH</h5>
                <p class="text-muted mb-3" style="font-size: 0.95rem;">Networking and Vlogging Company</p>

                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-tiktok me-2"></i>
                    <a href="https://www.tiktok.com/vibrant.club.ph" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        vibrant.club.ph
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-facebook me-2 text-primary"></i>
                    <a href="https://www.facebook.com/vibrant.club.ph" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        vibrant.club.ph
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-instagram me-2" style="color: #C13584;"></i>
                    <a href="https://www.instagram.com/vibrant.club.ph" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        vibrant.club.ph
                    </a>
                </h5>
            </div>

            <div class="col-md-4 text-center py-3 border">
                <img src="{{ asset('images/logo2.png') }}" class="img-fluid rounded-circle mb-3"
                    style="max-width: 200px; aspect-ratio: 1 / 1; object-fit: cover;" alt="Vibrant Club Profile">

                <h5 class="fw-bold mb-1" style="font-size: 1.1rem;">VIBRANT CLUB PH</h5>
                <p class="text-muted mb-3" style="font-size: 0.95rem;">Networking and Vlogging Company</p>

                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-tiktok me-2"></i>
                    <a href="https://www.tiktok.com/vibrant.club.ph" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        vibrant.club.ph
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-facebook me-2 text-primary"></i>
                    <a href="https://www.facebook.com/vibrant.club.ph" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        vibrant.club.ph
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-instagram me-2" style="color: #C13584;"></i>
                    <a href="https://www.instagram.com/vibrant.club.ph" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        vibrant.club.ph
                    </a>
                </h5>
            </div>

            <div class="col-md-4 text-center py-3 border">
                <img src="{{ asset('images/logo2.png') }}" class="img-fluid rounded-circle mb-3"
                    style="max-width: 200px; aspect-ratio: 1 / 1; object-fit: cover;" alt="Vibrant Club Profile">

                <h5 class="fw-bold mb-1" style="font-size: 1.1rem;">VIBRANT CLUB PH</h5>
                <p class="text-muted mb-3" style="font-size: 0.95rem;">Networking and Vlogging Company</p>

                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-tiktok me-2"></i>
                    <a href="https://www.tiktok.com/vibrant.club.ph" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        vibrant.club.ph
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-facebook me-2 text-primary"></i>
                    <a href="https://www.facebook.com/vibrant.club.ph" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        vibrant.club.ph
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-instagram me-2" style="color: #C13584;"></i>
                    <a href="https://www.instagram.com/vibrant.club.ph" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        vibrant.club.ph
                    </a>
                </h5>
            </div>

            <div class="col-md-4 text-center py-3 border">
                <img src="{{ asset('images/logo2.png') }}" class="img-fluid rounded-circle mb-3"
                    style="max-width: 200px; aspect-ratio: 1 / 1; object-fit: cover;" alt="Vibrant Club Profile">

                <h5 class="fw-bold mb-1" style="font-size: 1.1rem;">VIBRANT CLUB PH</h5>
                <p class="text-muted mb-3" style="font-size: 0.95rem;">Networking and Vlogging Company</p>

                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-tiktok me-2"></i>
                    <a href="https://www.tiktok.com/vibrant.club.ph" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        vibrant.club.ph
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-facebook me-2 text-primary"></i>
                    <a href="https://www.facebook.com/vibrant.club.ph" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        vibrant.club.ph
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-instagram me-2" style="color: #C13584;"></i>
                    <a href="https://www.instagram.com/vibrant.club.ph" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        vibrant.club.ph
                    </a>
                </h5>
            </div>

            <div class="col-md-4 text-center py-3 border">
                <img src="{{ asset('images/logo2.png') }}" class="img-fluid rounded-circle mb-3"
                    style="max-width: 200px; aspect-ratio: 1 / 1; object-fit: cover;" alt="Vibrant Club Profile">

                <h5 class="fw-bold mb-1" style="font-size: 1.1rem;">VIBRANT CLUB PH</h5>
                <p class="text-muted mb-3" style="font-size: 0.95rem;">Networking and Vlogging Company</p>

                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-tiktok me-2"></i>
                    <a href="https://www.tiktok.com/vibrant.club.ph" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        vibrant.club.ph
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-facebook me-2 text-primary"></i>
                    <a href="https://www.facebook.com/vibrant.club.ph" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        vibrant.club.ph
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-instagram me-2" style="color: #C13584;"></i>
                    <a href="https://www.instagram.com/vibrant.club.ph" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        vibrant.club.ph
                    </a>
                </h5>
            </div>


            {{-- <div class="col-md-4 border">
                <img src="{{ asset('images/logo3.png') }}" class="rounded-circle img-fluid mb-2">
                <h5 class="fw-bold">@vibrant_club_influencer</h5>
                <p>vibrant club niche</p>
            </div> --}}
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('register') }}" class="btn btn-outline-pink text-white fw-semibold"
                style="background-color: #ff0084;">Join us</a>
        </div>
    </div>

    <footer class="text-center py-4 mt-5 text-muted">
        &copy; {{ date('Y') }} Vibrant Club PH. All rights reserved.
    </footer>
</body>

</html>
