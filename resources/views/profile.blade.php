@extends('layouts.app')

@section('content')
    <div class="container p-3 bg-white">

        <div class="text-center fs-5 rounded shadow-sm p-3 ">
            <div class="mb-1">
                <img src="{{ asset('images/jerome.jpg') }}" alt="Your Logo" class="img-fluid rounded-circle"
                    style="height: 200px; width: 200px; object-fit: cover; border: 3px solid #ff0084;">
            </div>

            <div class="lh-sm">
                <span class="fs-3 fw-bold">{{ Auth::user()->firstname }} {{ Auth::user()->middlename }}
                    {{ Auth::user()->lastname }} </span> <br>
                <span class="fs-5 ">{{ Auth::user()->email }}</span>
            </div>
        </div>

        <div class="text-start p-4 fs-5 rounded shadow-sm ">
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="fab fa-facebook text-primary fs-5"></i>
                    </span>
                    <input type="text" class="form-control border-start-0" placeholder="Facebook profile link">
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="fab fa-instagram text-danger fs-5"></i>
                    </span>
                    <input type="text" class="form-control border-start-0" placeholder="Instagram profile link">
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="fab fa-tiktok text-dark fs-5"></i>
                    </span>
                    <input type="text" class="form-control border-start-0" placeholder="Tiktok profile link">
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="fab fa-twitter text-info fs-5"></i>
                    </span>
                    <input type="text" class="form-control border-start-0" placeholder="Twitter profile link">
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="fab fa-youtube text-danger fs-5"></i>
                    </span>
                    <input type="text" class="form-control border-start-0" placeholder="Youtube profile link">
                </div>
            </div>

            <div class="text-start mt-4">
                <button class="btn btn-outline-primary px-4">Save Changes</button>
            </div>

        </div>




    </div>
@endsection
