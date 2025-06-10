<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>VIBRANT CLUB PH</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- BOOTSTRAP VERSION WITH POPPER --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <!-- Tagify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" />
    <!-- Tagify JS -->
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>


    <style>
        /* app.blade.php */
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #fff0f5;
        }

        /* profile.blade.php */
        .btn-outline-vibrant {
            color: #ff0084;
            border: 1px solid #ff0084;
        }

        .btn-outline-vibrant:hover {
            background-color: #ff0084;
            color: #fff;
        }

        .tag-badge {
            background-color: #f44336;
            /* Vibrant red, customize as needed */
            color: white;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .tag-badge .remove-tag {
            cursor: pointer;
            font-weight: bold;
            color: white;
        }

        /* campaign dropdown */
        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu>.dropdown-menu {
            top: 0;
            left: 100%;
            /* Default: open to the right */
            margin-left: 0.1rem;
            display: none;
            position: absolute;
            z-index: 1000;
        }

        /* Show submenu on hover */
        .dropdown-submenu:hover>.dropdown-menu {
            display: block;
        }

        /* Fix overflow: If parent is near right edge, open to the left */
        .dropdown-submenu.dropstart>.dropdown-menu {
            left: auto;
            right: 100%;
            margin-left: 0;
            margin-right: 0.1rem;
        }
    </style>


</head>

<body>
    <div id="app">
        @auth
            <nav class="navbar navbar-expand-md" style="background-color: #ff0084;">
                <div class="container">
                    <a class="navbar-brand text-white fw-bold" href="{{ url('/') }}">
                        VIBRANT CLUB PH
                    </a>
                    <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto"></ul>

                        <ul class="navbar-nav ms-auto">
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown"
                                        class="nav-link dropdown-toggle d-flex align-items-center gap-2 text-white fw-semibold "
                                        href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>
                                        <span>
                                            {{ Auth::user()->firstname }}
                                            {{ Auth::user()->middlename ? Auth::user()->middlename . ' ' : '' }}{{ Auth::user()->lastname }}
                                        </span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end shadow small" aria-labelledby="navbarDropdown">
                                        <!-- Campaigns with Submenu -->
                                        <div class="dropdown-submenu dropstart position-relative">
                                            <a class="dropdown-item dropdown-toggle" href="#">Campaigns</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{ route('my_profile') }}">Active Campaigns</a></li>
                                                <li><a class="dropdown-item" href="{{ route('my_profile') }}">Archived Campaigns</a></li>
                                            </ul>
                                        </div>


                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item d-flex align-items-center gap-2"
                                            href="{{ route('my_profile') }}">
                                            <i class="bi bi-person-circle"></i> Profile
                                        </a>

                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="bi bi-box-arrow-right"></i> {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>

                                </li>

                            @endguest
                        </ul>


                    </div>
                </div>
            </nav>

        @endauth
        <main class="">
            @yield('content')
        </main>
    </div>
</body>

</html>
