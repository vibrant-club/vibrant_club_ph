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


        <h4 class="mb-4 fw-bold text-vibrant">📢 List of Available Campaigns</h4>

        <form method="GET" action="{{ route('home') }}" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search Title, Tags, Etc.."
                    value="{{ request('search') }}">

                <button type="submit" class="btn btn-vibrant-outline">Search</button>

                @if (request('search'))
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary">Clear</a>
                @endif
            </div>
        </form>


        <div class="row">
            @forelse ($campaigns as $campaign)
                <div class="col-md-6 col-lg-4 mb-4">

                    <div class="card card-glass h-100">
                        <div class="card-body px-4 py-4">
                            <h5 class="card-title fw-bold text-dark mb-3">{{ $campaign->title }}</h5>
                            {{-- <p class="fs-6  card-title fw-bold text-dark mb-2"> <ins> Campaign No.
                                    {{ $campaign->id }}</ins></p> --}}

                            {{-- <p class="text-muted mb-3 mt-3">
                                {!! nl2br(e($campaign->description)) !!}
                            </p> --}}

                            <ul class="list-unstyled text-secondary small mb-0">

                                <li class="mb-2">
                                    <i class="bi bi-list-ol me-2 text-vibrant"></i>Campaign No.
                                    <strong class="text-capitalize">{{ $campaign->id }}</strong>
                                </li>

                                <li class="mb-2">
                                    <i class="bi bi-buildings-fill me-2 text-vibrant"></i>Brand Name:
                                    <strong>{{ $campaign->brand_name }}</strong>
                                </li>

                                <li class="mb-2">
                                    <i class="bi bi-person-video2 me-2 text-vibrant"></i>Needed Influencers:
                                    <strong>
                                        {{ $campaign->total_influencers_needed !== null ? $campaign->total_influencers_needed : 'N/A' }}
                                    </strong>
                                </li>

                                <li class="mb-2">
                                    <i class="bi bi-cash-coin me-2 text-vibrant"></i>Rate Per Influencer:
                                    <strong>
                                        {{ $campaign->budget !== null ? '₱ ' . number_format($campaign->budget, 2) : 'N/A' }}
                                    </strong>
                                </li>

                                <li class="mb-2">
                                    <i class="bi bi-calendar-event me-2 text-vibrant"></i>Submission Until:
                                    <strong>{{ \Carbon\Carbon::parse($campaign->deadline)->format('F d, Y') }}</strong>
                                </li>

                                <li class="">
                                    <i class="bi bi-patch-question me-2 text-vibrant"></i>Status:
                                    <strong class="text-capitalize">{{ $campaign->status }}</strong>
                                </li>
                            </ul>
                        </div>

                        @if (!empty($campaign->tags) && is_array(json_decode($campaign->tags, true)))
                            @php
                                $tags = array_filter(json_decode($campaign->tags, true)); // Filter out null/empty
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
                        @endif


                        <hr>

                        <div class="card-footer bg-transparent border-0 px-4 pb-3">
                            <div class="d-flex gap-2 justify-content-center">
                                {{-- Modal Trigger --}}
                                <button class="btn btn-sm btn-vibrant-outline rounded-pill px-4" data-bs-toggle="modal"
                                    data-bs-target="#campaignModal{{ $campaign->id }}">
                                    View Details
                                </button>

                                {{-- <a href="{{ $campaign->form_link }}"
                                    class="btn btn-sm btn-vibrant-outline rounded-pill px-4" target="_blank">
                                    Enter Campaign
                                </a> --}}

                                @if (auth()->check() && auth()->user()->role === 1)
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

                {{-- Include the campaign modal --}}
                @include('modals.view_campaign_details', ['campaign' => $campaign])



            @empty
                <div class="text-center text-muted py-5">
                    No campaigns found.
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $campaigns->appends(['search' => request('search')])->links('vendor.pagination.simple-bootstrap-5') }}
        </div>


    </div>




@endsection
