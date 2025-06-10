@extends('layouts.app')

@section('content')
    <style>
        .text-vibrant {
            color: #ff0084;
        }

        .btn-vibrant-outline {
            color: #ff0084;
            border: 1px solid #ff0084;
            transition: all 0.3s ease;
        }

        .btn-vibrant-outline:hover {
            background-color: #ff0084;
            color: #fff;
        }

        .card-glass {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(6px);
            border: 2px solid #ff0084;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            border-radius: 1rem;
            transition: all 0.3s ease;
        }

        .card-glass:hover {
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08);
            transform: translateY(-4px);
        }
    </style>

    <div class="container-fluid p-4 border">
        <h2 class="mb-4 fw-bold text-vibrant">📢 Available Campaigns</h2>

        <form method="GET" action="{{ route('home') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search campaigns..."
                    value="{{ request('search') }}">

                <button type="submit" class="btn btn-vibrant-outline">Search</button>

                @if (request('search'))
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">Clear</a>
                @endif
            </div>
        </form>


        <div class="row">
            @foreach ($campaigns as $campaign)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card card-glass h-100">
                        <div class="card-body px-4 py-4">
                            <h5 class="card-title fw-bold text-dark mb-2">{{ $campaign->title }}</h5>

                            <p class="text-muted mb-3">
                                {{ $campaign->description }}
                            </p>

                            <ul class="list-unstyled text-secondary small mb-0">
                                <li class="mb-2">
                                    <i
                                        class="fas fa-building me-2 text-vibrant"></i><strong>{{ $campaign->brand_name }}</strong>
                                </li>
                                <li class="mb-2">
                                    <i
                                        class="fas fa-wallet me-2 text-vibrant"></i>₱{{ number_format($campaign->budget, 2) }}
                                    budget
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-calendar-alt me-2 text-vibrant"></i>Deadline:
                                    <strong>{{ \Carbon\Carbon::parse($campaign->deadline)->format('F d, Y') }}</strong>
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-users me-2 text-vibrant"></i>Total Influencers:
                                    {{ $campaign->total_influencers_needed }}
                                </li>
                                <li>
                                    <i
                                        class="fas fa-circle me-2 {{ $campaign->status === 'active' ? 'text-success' : 'text-secondary' }}"></i>Status:
                                    <strong class="text-capitalize">{{ $campaign->status }}</strong>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-end px-4 pb-3">
                            <a href="{{ $campaign->form_link }}" class="btn btn-sm btn-vibrant-outline rounded-pill px-4"
                                target="_blank">
                                View Details
                            </a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $campaigns->appends(['search' => request('search')])->links('vendor.pagination.simple-bootstrap-5') }}
        </div>


    </div>
@endsection
