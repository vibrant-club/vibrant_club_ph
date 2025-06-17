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
                    <h5 class="mb-3 text-danger">🚨 EXCLUSIVE OPPORTUNITY 🚨</h5>
                    <h5 class="mb-3">✨ Be a Pioneer + System Tester for Vibrant Club PH ✨</h5>
                    <p>
                        We’re looking for <strong>Early adopters</strong> to join our exclusive opportunity and
                        become part of our inner circle 💫
                    </p>
                    <p>As a <strong>Pioneer Member & System Tester</strong>, you'll get:</p>
                    <ul>
                        <li>✅ Lifetime access to the platform</li>
                        <li>✅ Sharable Influencer Profile to showcase your personal brand anywhere</li>
                        <li>✅ Early access to all upcoming features and campaigns</li>
                        <li>✅ Exclusive badge on your profile after a month</li>
                        <li>✅ Chance to be featured on our socials</li>
                        <li>✅ Lifetime perks for active contributors</li>
                    </ul>
                    <p>
                        💡 <strong>Help us shape the future of influencer collaboration in the Philippines.</strong><br>
                        We’re building this community <em>with you, for you</em>.
                    </p>
                    <p>
                        📩 Fill up the application form now:
                        👉 <a
                            href="https://docs.google.com/forms/d/e/1FAIpQLSfXdwHiEm2JUMQe2picIo368hXgdPqLllMAhGg8Cga_VH5tgg/viewform"
                            target="_blank">
                            <strong>Click here to apply</strong>
                        </a>
                    </p>
                    <p class="mb-0 text-danger fw-bold">⏳ Limited slots only. First come, first served!</p>
                    <p class="mt-3 mb-0">
                        <small>#VibrantClubPH #XDeal #PioneerInfluencer #SystemTester #InfluencerPH #CollabPH
                            #DigitalCreatorCommunity</small>
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
