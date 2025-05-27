@extends('layouts.app')

@section('content')
    <div class="container p-3 bg-white">

        <!-- Header Banner -->
        <div class="text-center py-4"
            style=" background: linear-gradient(135deg, #ff0084, #f4b1d4);  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
            <h1 class="text-white mt-2 mb-0 fw-bold" style="font-size: 1.5rem;">VIBRANT CLUB PH</h1>
            <p class="text-white-50 mb-0 fs-5">Public Influencer Profile</p>
        </div>


        <div class="text-center fs-5 shadow-sm p-3 border">
            <div class="position-relative mx-auto mb-2" style="width: 200px; height: 200px;">
                <img src="{{ $user->profile_image ? asset('storage/profile_images/' . $user->profile_image) : asset('images/logo3.png') }}"
                    class="rounded-circle w-100 h-100 border border-3 border-danger" style="object-fit: cover;"
                    alt="Profile Image">
            </div>

            <div class="lh-sm">
                <span class="fs-3 fw-bold">{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}</span><br>
                <span class="text-muted">{{ $user->email }}</span>
            </div>

            @if ($user->about)
                <div class="mt-3">
                    <label class="fw-semibold d-block mb-1">About</label>
                    <p class="text-muted">{{ $user->about }}</p>
                </div>
            @endif
        </div>

        <div class="text-start p-3 fs-5 rounded shadow-sm border">
            @if ($user->facebook)
                <div class="mb-2">
                    <i class="fab fa-facebook text-primary me-2"></i>
                    <a href="{{ $user->facebook }}" target="_blank">{{ $user->facebook }}</a>
                </div>
            @endif

            @if ($user->instagram)
                <div class="mb-2">
                    <i class="fab fa-instagram text-danger me-2"></i>
                    <a href="{{ $user->instagram }}" target="_blank">{{ $user->instagram }}</a>
                </div>
            @endif

            @if ($user->tiktok)
                <div class="mb-2">
                    <i class="fab fa-tiktok text-dark me-2"></i>
                    <a href="{{ $user->tiktok }}" target="_blank">{{ $user->tiktok }}</a>
                </div>
            @endif

            @if ($user->twitter)
                <div class="mb-2">
                    <i class="fab fa-twitter text-info me-2"></i>
                    <a href="{{ $user->twitter }}" target="_blank">{{ $user->twitter }}</a>
                </div>
            @endif

            @if ($user->youtube)
                <div class="mb-2">
                    <i class="fab fa-youtube text-danger me-2"></i>
                    <a href="{{ $user->youtube }}" target="_blank">{{ $user->youtube }}</a>
                </div>
            @endif
        </div>
    </div>
@endsection
