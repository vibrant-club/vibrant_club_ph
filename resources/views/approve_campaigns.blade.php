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

        <h4 class="mb-4 fw-bold text-vibrant">🔎 Campaign Approvals</h4>

        <!-- 🔽 Filter Dropdown Starts Here -->
        <form method="GET" action="{{ route('approve_campaigns') }}" class="mb-4">
            <div class="input-group w-auto">
                <label class="input-group-text bg-light">Filter</label>
                <select name="filter" class="form-select" onchange="this.form.submit()">
                    <option value="pending" {{ $filter === 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="declined" {{ $filter === 'declined' ? 'selected' : '' }}>Declined</option>
                </select>
            </div>
        </form>
        <!-- 🔼 Filter Dropdown Ends Here -->


        <div class="row">
            @foreach ($campaigns as $campaign)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card card-glass h-100">
                        <div class="card-body px-4 py-4">
                            <h5 class="card-title fw-bold text-dark mb-2">{{ $campaign->title }}</h5>
                            <p class="fs-6  card-title fw-bold text-dark mb-2"> <ins> Campaign No.
                                    {{ $campaign->id }}</ins></p>

                            <p class="text-muted mb-3  mt-3">
                                {!! nl2br(e($campaign->description)) !!}
                            </p>

                            <ul class="list-unstyled text-secondary small mb-0">
                                <li class="mb-2">
                                    <i class="fas fa-building me-2 text-vibrant"></i>&nbsp;&nbsp;Brand Name:
                                    <strong>{{ $campaign->brand_name }}</strong>
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-users me-2 text-vibrant"></i>&nbsp;Needed Influencers:
                                    <strong>
                                        {{ $campaign->total_influencers_needed !== null ? $campaign->total_influencers_needed : 'Not applicable' }}
                                    </strong>
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-wallet me-2 text-vibrant"></i>&nbsp;&nbsp;Rate Per Influencer:
                                    <strong>
                                        {{ $campaign->budget !== null ? '₱ ' . number_format($campaign->budget, 2) : 'Not applicable' }}
                                    </strong>
                                </li>
                                <li class="mb-2">
                                    <i class="fas fa-calendar-alt me-2 text-vibrant"></i>&nbsp;&nbsp;Submission Deadline:
                                    <strong>{{ \Carbon\Carbon::parse($campaign->deadline)->format('F d, Y') }}</strong>
                                </li>
                                <li>
                                    <i class="bi bi-patch-question me-2 text-vibrant"></i>&nbsp;&nbsp;Status:
                                    <strong class="text-capitalize">{{ $campaign->status }}</strong>
                                </li>
                            </ul>
                        </div>

                        @php
                            $tags = array_filter(json_decode($campaign->tags ?? '[]', true));
                        @endphp

                        @if (count($tags) > 0)
                            <div class="px-4 pb-1">
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach ($tags as $tag)
                                        <span class="badge bg-vibrant text-white rounded-pill px-3 py-1">
                                            <i class="fas fa-tag me-1"></i> {{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <hr>

                        <div class="card-footer bg-transparent border-0 px-4 pb-3">
                            <div class="d-flex justify-content-center gap-2">
                                <form action="{{ route('campaigns.approve', $campaign->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to approve this campaign?');">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-success rounded-pill px-4">
                                        <i class="bi bi-check-circle me-1"></i> Approve
                                    </button>
                                </form>

                                @if ($campaign->is_approved != 2)
                                    <form action="{{ route('campaigns.decline', $campaign->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to decline this campaign?');">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-danger rounded-pill px-4">
                                            <i class="bi bi-x-circle me-1"></i> Decline
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
            {{ $campaigns->appends(['filter' => request('filter')])->links('vendor.pagination.simple-bootstrap-5') }}
        </div>


    </div>
@endsection
