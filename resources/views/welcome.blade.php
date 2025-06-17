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
    <div class="hero text-center">
        {{-- <img src="{{ asset('images/logo3.png') }}" alt="Vibrant Club PH Logo" class="mb-3"> --}}
        <h1 class="display-5 fw-bold">Welcome to Vibrant Club PH</h1>
        <p class="lead">"Where influencers rise, connect, and thrive."</p>

        <p class="fs-6 text-muted mx-auto mt-2" style="max-width: 700px;">
            <strong>Vibrant Club PH</strong> is a Marketing Agency that focuses on connecting brands with influencers,
            content creators, and digital talents across the Philippines.
            <br><br>
            We specialize in influencer-driven marketing, helping businesses amplify their campaigns through authentic
            creator collaborations. Whether it's launching a product, promoting an event, or boosting brand awareness —
            we build bridges between creative talents and brands that want to make an impact.
            <br><br>
            At the same time, Vibrant Club PH supports creators by giving them access to campaigns, exposure
            opportunities, and a platform to showcase their influence.
        </p>

        <a href="{{ route('login') }}" class="btn btn-light rounded-pill px-4 py-2 fw-semibold mt-3">Login Account</a>
        {{-- <a href="{{ route('register') }}" class="btn btn-light rounded-pill px-4 py-2 fw-semibold">Register Account</a> --}}
    </div>



    <div class="container mt-4">
        <h2 class="section-title text-center mb-4">📢 Announcements</h2>
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card announcement-card shadow-sm p-4">
                    <h5 class="mb-3 text-danger">🚨 EXCLUSIVE OPPORTUNITY</h5>
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
                <img src="{{ asset('images/6.jpg') }}" class="img-fluid rounded-circle mb-3"
                    style="max-width: 200px; aspect-ratio: 1 / 1; object-fit: cover;" alt="Vibrant Club Profile">

                <h5 class="fw-bold mb-1" style="font-size: 1.1rem;">Ma. Margarita Jimenez</h5>
                <p class="text-muted mb-3" style="font-size: 0.95rem;">Beauty and Personal care</p>

                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-tiktok me-2"></i>
                    <a href="https://www.tiktok.com/@itsmemmarg02" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        @itsmemmarg02
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-facebook me-2 text-primary"></i>
                    <a href="https://www.facebook.com/@Itsmemarg02" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        @Itsmemarg02
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-instagram me-2" style="color: #C13584;"></i>
                    <a href="https://www.instagram.com/itsmemargjimenez" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        @itsmemargjimenez
                    </a>
                </h5>
            </div>

            <div class="col-md-4 text-center py-3 border">
                <img src="{{ asset('images/4.jpg') }}" class="img-fluid rounded-circle mb-3"
                    style="max-width: 200px; aspect-ratio: 1 / 1; object-fit: cover;" alt="Vibrant Club Profile">

                <h5 class="fw-bold mb-1" style="font-size: 1.1rem;">Zaila Mariz Sanchez</h5>
                <p class="text-muted mb-3" style="font-size: 0.95rem;">Beauty, Skin Care and Fashion </p>

                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-tiktok me-2"></i>
                    <a href="https://www.tiktok.com/@zaillalas_" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        @zaillalas_
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-facebook me-2 text-primary"></i>
                    <a href="https://www.facebook.com/zaillala" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        @zaillala
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-instagram me-2" style="color: #C13584;"></i>
                    <a href="https://www.instagram.com/zai_ugc" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        @zai_ugc
                    </a>
                </h5>
            </div>

            <div class="col-md-4 text-center py-3 border">
                <img src="{{ asset('images/5.jpg') }}" class="img-fluid rounded-circle mb-3"
                    style="max-width: 200px; aspect-ratio: 1 / 1; object-fit: cover;" alt="Vibrant Club Profile">

                <h5 class="fw-bold mb-1" style="font-size: 1.1rem;">Cyrille Jane Galindo</h5>
                <p class="text-muted mb-3" style="font-size: 0.95rem;">Motherhood, Lifstyle, Food, Beauty, Events and some UGC works</p>

                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-tiktok me-2"></i>
                    <a href="https://www.tiktok.com/@galindofamily_24" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        @galindofamily_24
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-facebook me-2 text-primary"></i>
                    <a href="https://www.facebook.com/elliryccj24" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        @elliryccj24
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-instagram me-2" style="color: #C13584;"></i>
                    <a href="https://www.instagram.com/elliryccj" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        @elliryccj
                    </a>
                </h5>
            </div>

            <div class="col-md-4 text-center py-3 border">
                <img src="{{ asset('images/7.png') }}" class="img-fluid rounded-circle mb-3"
                    style="max-width: 200px; aspect-ratio: 1 / 1; object-fit: cover;" alt="Vibrant Club Profile">

                <h5 class="fw-bold mb-1" style="font-size: 1.1rem;">Ma. Jenel Armeña</h5>
                <p class="text-muted mb-3" style="font-size: 0.95rem;">I usually create contents centered on beauty, specifically skincare, but I also create videos regarding fashion, lifestyle/wellness, and tech for brand collaborations. My style is a mix of aesthetic videos (i.e., perfume content),</p>

                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-tiktok me-2"></i>
                    <a href="https://www.tiktok.com/@a.riaugc" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        @a.riaugc
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-facebook me-2 text-primary"></i>
                    <a href="https://www.facebook.com/@MJArmeña" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        @MJArmeña
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-instagram me-2" style="color: #C13584;"></i>
                    <a href="https://www.instagram.com/a.riaugc" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        a.riaugc
                    </a>
                </h5>
            </div>

            <div class="col-md-4 text-center py-3 border">
                <img src="{{ asset('images/8.jpeg') }}" class="img-fluid rounded-circle mb-3"
                    style="max-width: 200px; aspect-ratio: 1 / 1; object-fit: cover;" alt="Vibrant Club Profile">

                <h5 class="fw-bold mb-1" style="font-size: 1.1rem;">Lira Joy Caguillo</h5>
                <p class="text-muted mb-3" style="font-size: 0.95rem;">Beauty, Electronics, Lifestyle, Mixed</p>

                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-tiktok me-2"></i>
                    <a href="https://www.tiktok.com/@lai.villarama" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        @lai.villarama
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-facebook me-2 text-primary"></i>
                    <a href="https://www.facebook.com/liravillarama" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        liravillarama
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-instagram me-2" style="color: #C13584;"></i>
                    <a href="https://www.instagram.com/laivillarama" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        laivillarama
                    </a>
                </h5>
            </div>

            <div class="col-md-4 text-center py-3 border">
                <img src="{{ asset('images/9.jpeg') }}" class="img-fluid rounded-circle mb-3"
                    style="max-width: 200px; aspect-ratio: 1 / 1; object-fit: cover;" alt="Vibrant Club Profile">

                <h5 class="fw-bold mb-1" style="font-size: 1.1rem;">Jeuel Daenne Mission</h5>
                <p class="text-muted mb-3" style="font-size: 0.95rem;">Travel, Lifestyle, Beauty</p>

                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-tiktok me-2"></i>
                    <a href="https://www.tiktok.com/@daenneee" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        @daenneee
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-facebook me-2 text-primary"></i>
                    <a href="https://www.facebook.com/DaenneMission" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        DaenneMission
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-instagram me-2" style="color: #C13584;"></i>
                    <a href="https://www.instagram.com/missiondaenne" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        missiondaenne
                    </a>
                </h5>
            </div>

            <div class="col-md-4 text-center py-3 border">
                <img src="{{ asset('images/12.jpg') }}" class="img-fluid rounded-circle mb-3"
                    style="max-width: 200px; aspect-ratio: 1 / 1; object-fit: cover;" alt="Vibrant Club Profile">

                <h5 class="fw-bold mb-1" style="font-size: 1.1rem;">Zia Los Baños</h5>
                <p class="text-muted mb-3" style="font-size: 0.95rem;">Fashion, Beauty, Wellness/Lifestyle </p>

                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-tiktok me-2"></i>
                    <a href="https://www.tiktok.com/@_ziaangelovesu" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        @_ziaangelovesu
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-facebook me-2 text-primary"></i>
                    <a href="https://www.facebook.com/ZiaLosBaños " target="_blank"
                        style="text-decoration: none; color: inherit;">
                        ZiaLosBaños 
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-instagram me-2" style="color: #C13584;"></i>
                    <a href="https://www.instagram.com/_ziaangela" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        _ziaangela
                    </a>
                </h5>
            </div>


            <div class="col-md-4 text-center py-3 border">
                <img src="{{ asset('images/14.JPG') }}" class="img-fluid rounded-circle mb-3"
                    style="max-width: 200px; aspect-ratio: 1 / 1; object-fit: cover;" alt="Vibrant Club Profile">

                <h5 class="fw-bold mb-1" style="font-size: 1.1rem;">Maringal Ito</h5>
                <p class="text-muted mb-3" style="font-size: 0.95rem;">Breastfeeding, Parenting, Mom & Baby</p>

                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-tiktok me-2"></i>
                    <a href="https://www.tiktok.com/@maringal.ito" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        @maringal.ito
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-facebook me-2 text-primary"></i>
                    <a href="https://www.facebook.com/Maringal Ito " target="_blank"
                        style="text-decoration: none; color: inherit;">
                        Maringal Ito 
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-instagram me-2" style="color: #C13584;"></i>
                    <a href="https://www.instagram.com/maringal.ito" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        maringal.ito
                    </a>
                </h5>
            </div>



            <div class="col-md-4 text-center py-3 border">
                <img src="{{ asset('images/15.JPG') }}" class="img-fluid rounded-circle mb-3"
                    style="max-width: 200px; aspect-ratio: 1 / 1; object-fit: cover;" alt="Vibrant Club Profile">

                <h5 class="fw-bold mb-1" style="font-size: 1.1rem;">Frances Louisse Fronda</h5>
                <p class="text-muted mb-3" style="font-size: 0.95rem;">Lifestyle, Beauty, Mommy</p>

                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-tiktok me-2"></i>
                    <a href="https://www.tiktok.com/@lifewithfrancessa" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        @lifewithfrancessa
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-facebook me-2 text-primary"></i>
                    <a href="https://www.facebook.com/franceslouisse " target="_blank"
                        style="text-decoration: none; color: inherit;">
                        franceslouisse 
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-instagram me-2" style="color: #C13584;"></i>
                    <a href="https://www.instagram.com/fraancessa" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        fraancessa
                    </a>
                </h5>
            </div>

            <div class="col-md-4 text-center py-3 border">
                <img src="{{ asset('images/20.JPG') }}" class="img-fluid rounded-circle mb-3"
                    style="max-width: 200px; aspect-ratio: 1 / 1; object-fit: cover;" alt="Vibrant Club Profile">

                <h5 class="fw-bold mb-1" style="font-size: 1.1rem;">Angela Bacerdo</h5>
                <p class="text-muted mb-3" style="font-size: 0.95rem;">Skin care, Food anf Lifestyle</p>

                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-tiktok me-2"></i>
                    <a href="https://www.tiktok.com/@gel0003.ugc" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        @gel0003.ugc
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-facebook me-2 text-primary"></i>
                    <a href="https://www.facebook.com/ugcGela " target="_blank"
                        style="text-decoration: none; color: inherit;">
                        ugcGela 
                    </a>
                </h5>
                <h5 class="mb-1" style="font-size: 1rem;">
                    <i class="fab fa-instagram me-2" style="color: #C13584;"></i>
                    <a href="https://www.instagram.com/gel0003.ugc" target="_blank"
                        style="text-decoration: none; color: inherit;">
                        gel0003.ugc
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
