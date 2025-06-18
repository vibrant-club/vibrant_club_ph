@extends('layouts.app')

@section('content')
    <div class="container p-3 bg-white">

        <!-- Header Banner -->
        <div class="text-center py-4"
            style=" background: linear-gradient(135deg, #ff0084, #e489b8);  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
            <h1 class="text-white mt-2 mb-0 fw-bold" style="font-size: 1.5rem;">VIBRANT CLUB PH</h1>
            <p class="text-white-50 mb-0 fs-5">Public Influencer Profile</p>
        </div>


        <div class="text-center fs-5 shadow-sm p-3 border">
            <div class="position-relative mx-auto mb-2" style="width: 200px; height: 200px;">
                <img src="{{ $user->profile_image ? asset('storage/profile_images/' . $user->profile_image) : asset('images/logo3.png') }}"
                    class="rounded-circle w-100 h-100 border border-3 border-danger" style="object-fit: cover;"
                    alt="Profile Image">
            </div>

            <div class="lh-1" style="word-break: break-word; overflow-wrap: anywhere;">
                <span class="fs-3 fw-bold d-block">{{ $user->firstname }} {{ $user->middlename }}
                    {{ $user->lastname }}</span>
                <span class="text-muted d-block" style="word-break: break-word; overflow-wrap: anywhere;">
                    {{ $user->email }}
                </span>
            </div>


            @if ($user->about)
                <div class="mt-3 lh-sm">
                    <label class="fw-semibold d-block mb-1 fs-5">Introduction</label>
                    <p class="text-muted fs-6">{{ $user->about }}</p>
                </div>
            @endif

            @if ($user->tags->count())
                <div class="mt-3 lh-sm">
                    <div class="d-flex flex-wrap gap-1">
                        @foreach ($user->tags as $tag)
                            <span class="px-3 py-1 rounded-pill text-white"
                                style="background-color: #ff0084; font-size: 0.75rem;">
                                #{{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endif



        </div>

        <div class="text-start p-3 fs-6 rounded shadow-sm border">
            @if ($user->facebook)
                <div class="mb-2 d-flex align-items-center">
                    <i class="fab fa-facebook text-primary me-2"></i>
                    <a href="{{ $user->facebook }}" target="_blank" class="text-truncate d-inline-block"
                        style="max-width: 100%; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                        {{ $user->facebook }}
                    </a>
                </div>
            @endif

            @if ($user->instagram)
                <div class="mb-2 d-flex align-items-center">
                    <i class="fab fa-instagram text-danger me-2"></i>
                    <a href="{{ $user->instagram }}" target="_blank" class="text-truncate d-inline-block"
                        style="max-width: 100%; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                        {{ $user->instagram }}
                    </a>
                </div>
            @endif

            @if ($user->tiktok)
                <div class="mb-2 d-flex align-items-center">
                    <i class="fab fa-tiktok text-dark me-2"></i>
                    <a href="{{ $user->tiktok }}" target="_blank" class="text-truncate d-inline-block"
                        style="max-width: 100%; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                        {{ $user->tiktok }}
                    </a>
                </div>
            @endif

            @if ($user->twitter)
                <div class="mb-2 d-flex align-items-center">
                    <i class="fab fa-twitter text-info me-2"></i>
                    <a href="{{ $user->twitter }}" target="_blank" class="text-truncate d-inline-block"
                        style="max-width: 100%; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                        {{ $user->twitter }}
                    </a>
                </div>
            @endif

            @if ($user->youtube)
                <div class="mb-2 d-flex align-items-center">
                    <i class="fab fa-youtube text-danger me-2"></i>
                    <a href="{{ $user->youtube }}" target="_blank" class="text-truncate d-inline-block"
                        style="max-width: 100%; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">
                        {{ $user->youtube }}
                    </a>
                </div>
            @endif
        </div>


        <div class="text-center mt-3">
            <a href="{{ route('register') }}" class="btn btn-sm btn-outline-pink text-white fw-semibold"
                style="background-color: #ff0084;"> <i class="fa-solid fa-arrow-right-to-bracket me-2"></i>Join us</a>

            <button type="button" class="btn btn-sm btn-outline-pink text-white fw-semibold"
                style="background-color: #ff0084;" onclick="copyCurrentUrl()">
                <i class="fas fa-share-alt me-2"></i> Share
            </button>
        </div>
    </div>



    <script>
        function copyCurrentUrl() {
            navigator.clipboard.writeText(window.location.href)
                .then(() => alert('Link copied to clipboard!'))
                .catch(err => alert('Failed to copy link: ' + err));
        }
    </script>

@endsection
