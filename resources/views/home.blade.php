@extends('layouts.app')

@section('content')
    <style>
        .text-vibrant {
            color: #ff0084;
        }

        .bg-vibrant {
            background-color: #ff0084;
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
                                    <i class="fas fa-calendar-alt me-2 text-vibrant"></i>&nbsp;&nbsp;Deadline For
                                    Submission:
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
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $campaigns->appends(['search' => request('search')])->links('vendor.pagination.simple-bootstrap-5') }}
        </div>


    </div>



    <!-- Add Campaign Modal -->
    <div class="modal fade" id="addCampaignModal" tabindex="-1" aria-labelledby="addCampaignModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <!-- Header -->
                <div class="modal-header" style="background-color: #ff0084;">
                    <h5 class="modal-title text-white fw-bold" id="addCampaignModalLabel">
                        <i class="bi bi-megaphone-fill me-2"></i> Create New Campaign
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <!-- Form -->
                <form action="{{ route('campaigns.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="modal-body px-4 pt-4 pb-2">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Campaign Title</label>
                            <input type="text" class="form-control rounded-pill" name="title" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Brand Name</label>
                            <input type="text" class="form-control rounded-pill" name="brand_name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Campaign Description</label>
                            <textarea class="form-control rounded-3" name="description" rows="10" required></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Budget per Influencer</label>
                                <input type="number" class="form-control rounded-pill" name="budget_per_influencer"
                                    min="0" step="0.01" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Total Influencers Needed</label>
                                <input type="number" class="form-control rounded-pill" name="total_influencers"
                                    min="1" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Deadline For Submission</label>
                            <input type="date" class="form-control rounded-pill" name="deadline" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Form Link (Google Forms, Typeform, etc.)</label>
                            <input type="url" class="form-control rounded-pill" name="form_link">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Status</label>
                            <select class="form-select rounded-pill" name="status" required>
                                <option value="active">Active</option>
                                <option value="upcoming">Upcoming</option>
                                <option value="completed">Completed</option>
                                <option value="paused">Paused</option>
                            </select>
                        </div>

                        <div class="mb-3 text-start">
                            <label for="tag-input-new-campaign" class="form-label fw-semibold">Tags</label>
                            <input name="tags" id="tag-input-new-campaign" class="form-control"
                                placeholder="Select or type tags...">
                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="modal-footer p-3 justify-content-center">

                        <button type="submit" class="btn text-white rounded-pill px-4"
                            style="background-color: #ff0084;">
                            <i class="bi bi-check-circle me-1"></i> Create Campaign
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.querySelector('#tag-input-new-campaign');

            // Pass predefined tags from Laravel to JavaScript
            const predefinedTags = @json(\App\Models\Tag::pluck('name'));

            const tagify = new Tagify(input, {
                whitelist: predefinedTags,
                dropdown: {
                    enabled: 0, // show suggestions on focus
                    maxItems: 20,
                    classname: "tags-look",
                    closeOnSelect: false
                }
            });

            // Before form submit, convert tagify's JSON to CSV string
            input.closest('form').addEventListener('submit', function() {
                input.value = tagify.value.map(item => item.value).join(',');
            });
        });
    </script>
@endsection
