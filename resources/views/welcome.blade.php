<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vibrant Club PH</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <div class="card announcement-card shadow-sm p-3">
                    <h5>✨ Get FREE Access to Vibrant Club PH – Starting June 15!</h5>
                    <p>To celebrate the growth of Vibrant Club PH, we’re opening our doors to 50 Filipino influencers for exclusive FREE access to our platform!.</p>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card announcement-card shadow-sm p-3">
                    <h5>✨ Upcoming Influencer Bootcamp – June 2025</h5>
                    <p>Don't miss our exclusive bootcamp packed with training, networking, and branding strategies.</p>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card announcement-card shadow-sm p-3">
                    <h5>✨ Upcoming Influencer Bootcamp – June 2025</h5>
                    <p>Don't miss our exclusive bootcamp packed with training, networking, and branding strategies.</p>
                </div>
            </div>
        </div>
        

        <h2 class="section-title text-center mb-4">📸 Featured Creators</h2>
        <div class="row text-center">
            <div class="col-md-4 border">
                <img src="{{ asset('images/logo3.png') }}" class="rounded-circle img-fluid mb-2">
                <h5 class="fw-bold">@lifestylequeenie</h5>
                <p>Beauty & Wellness Guru</p>
            </div>
            <div class="col-md-4 border">
                <img src="{{ asset('images/logo3.png') }}" class="rounded-circle img-fluid mb-2">
                <h5 class="fw-bold">@techiegram</h5>
                <p>Gadget Reviewer</p>
            </div>
            <div class="col-md-4 border">
                <img src="{{ asset('images/logo3.png') }}" class="rounded-circle img-fluid mb-2">
                <h5 class="fw-bold">@foodiefrenzy</h5>
                <p>Travel & Food Blogger</p>
            </div>
            <div class="col-md-4 border">
                <img src="{{ asset('images/logo3.png') }}" class="rounded-circle img-fluid mb-2">
                <h5 class="fw-bold">@foodiefrenzy</h5>
                <p>Travel & Food Blogger</p>
            </div>
            <div class="col-md-4 border">
                <img src="{{ asset('images/logo3.png') }}" class="rounded-circle img-fluid mb-2">
                <h5 class="fw-bold">@foodiefrenzy</h5>
                <p>Travel & Food Blogger</p>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('login') }}" class="btn btn-outline-pink text-white fw-semibold"
                style="background-color: #ff0084;">Login to Your Account</a>
        </div>
    </div>

    <footer class="text-center py-4 mt-5 text-muted">
        &copy; {{ date('Y') }} Vibrant Club PH. All rights reserved.
    </footer>
</body>

</html>
