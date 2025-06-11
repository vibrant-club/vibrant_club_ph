@extends('layouts.app')

@section('content')
    <div class="container-fluid p-4 border">

        @if (session('success'))
            <div class="alert alert-dismissible fade show text-white border-0" role="alert"
                style="background-color: #ff0084;">
                {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <h4 class="mb-4 fw-bold text-vibrant">📢 Available Campaigns</h4>

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
                                {!! nl2br(e($campaign->description)) !!}
                            </p>

                            <ul class="list-unstyled text-secondary small mb-0">
                                <li class="mb-2">
                                    &nbsp;<i class="fas fa-building me-2 text-vibrant"></i>&nbsp;&nbsp;Brand Name:
                                    <strong>{{ $campaign->brand_name }}</strong>
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-users me-2 text-vibrant"></i>&nbsp;Total Influencers Needed:
                                    <strong> {{ $campaign->total_influencers_needed }} </strong>
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-wallet me-2 text-vibrant"></i>&nbsp;&nbsp;Budget Per Influencer:
                                    <strong>
                                        ₱ {{ number_format($campaign->budget, 2) }} </strong>

                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-calendar-alt me-2 text-vibrant"></i>&nbsp;&nbsp;Submission Deadline:
                                    <strong>{{ \Carbon\Carbon::parse($campaign->deadline)->format('F d, Y') }}</strong>
                                </li>

                                <li>
                                    <i
                                        class="fas fa-circle me-2 {{ $campaign->status === 'active' ? 'text-success' : 'text-secondary' }}"></i>&nbsp;&nbsp;Status:
                                    <strong class="text-capitalize">{{ $campaign->status }}</strong>
                                </li>
                            </ul>
                        </div>

                        {{-- 👇 Tags section inserted here --}}
                        @if (!empty($campaign->tags) && is_array(json_decode($campaign->tags, true)))
                            <div class="px-4 pb-1">
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach (json_decode($campaign->tags, true) as $tag)
                                        <span class="badge bg-vibrant text-white rounded-pill px-3 py-1">
                                            <i class="fas fa-tag me-1"></i> {{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <hr>

                        <div class="card-footer bg-transparent border-0 px-4 pb-3">
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="{{ $campaign->form_link }}"
                                    class="btn btn-sm btn-vibrant-outline rounded-pill px-4" target="_blank">
                                    Enter Campaign
                                </a>

                                @if (auth()->check() && auth()->user()->role === 1 && $campaign->user_id === auth()->id())
                                    <form action="{{ route('campaigns.destroy', $campaign->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this campaign?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-4">
                                            <i class="bi bi-trash me-1"></i> Delete
                                        </button>
                                    </form>
                                @endif

                            </div>
                        </div>


                    </div>

                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $campaigns->appends(['search' => request('search')])->links('vendor.pagination.simple-bootstrap-5') }}
        </div>

        <footer class="text-center py-4 mt-5 text-muted">
            &copy; {{ date('Y') }} Vibrant Club PH. All rights reserved.
        </footer>
    </div>
@endsection
