@extends('layouts.app')

@section('content')
    <div class="container-fluid p-4 border">
        <h2 class="mb-4 fw-bold text-vibrant">📢 Available Campaigns</h2>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 rounded-4 bg-light">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold text-dark">Campaign Title 1</h5>
                        <p class="card-text text-muted">This is a short description of the campaign to give influencers a
                            quick overview of what it's about.</p>
                        <p class="text-secondary small">
                            <i class="fas fa-wallet me-2 text-vibrant"></i>₱5,000
                            <br>
                            <i class="fas fa-calendar-alt me-2 text-vibrant"></i>Deadline: June 10, 2025
                        </p>
                    </div>
                    <div class="card-footer bg-transparent border-0 text-end">
                        <a href="#" class="btn btn-sm btn-outline-vibrant rounded-pill px-3">View Details</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 rounded-4 bg-light">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold text-dark">Campaign Title 2</h5>
                        <p class="card-text text-muted">Another sample campaign with a different offer and deadline to show
                            variety in the layout.</p>
                        <p class="text-secondary small">
                            <i class="fas fa-wallet me-2 text-vibrant"></i>₱8,000
                            <br>
                            <i class="fas fa-calendar-alt me-2 text-vibrant"></i>Deadline: July 1, 2025
                        </p>
                    </div>
                    <div class="card-footer bg-transparent border-0 text-end">
                        <a href="#" class="btn btn-sm btn-outline-vibrant rounded-pill px-3">View Details</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 rounded-4 bg-light">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold text-dark">Campaign Title 3</h5>
                        <p class="card-text text-muted">Brief campaign teaser. Use this to attract influencers and encourage
                            them to learn more.</p>
                        <p class="text-secondary small">
                            <i class="fas fa-wallet me-2 text-vibrant"></i>₱10,000
                            <br>
                            <i class="fas fa-calendar-alt me-2 text-vibrant"></i>Deadline: May 30, 2025
                        </p>
                    </div>
                    <div class="card-footer bg-transparent border-0 text-end">
                        <a href="#" class="btn btn-sm btn-outline-vibrant rounded-pill px-3">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
