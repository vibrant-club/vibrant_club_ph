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

                        {{-- 👇 Tags section inserted here --}}
                        @if (!empty($campaign->tags) && is_array(json_decode($campaign->tags, true)))
                            <div class="px-4 pb-2">
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach (json_decode($campaign->tags, true) as $tag)
                                        <span class="badge bg-vibrant text-white rounded-pill px-3 py-1">
                                            <i class="fas fa-tag me-1"></i> {{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif



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
                <form action="" method="POST" enctype="multipart/form-data">
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
                            <label class="form-label fw-semibold">Description</label>
                            <textarea class="form-control rounded-3" name="description" rows="4" required></textarea>
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
                            <label class="form-label fw-semibold">Deadline</label>
                            <input type="date" class="form-control rounded-pill" name="deadline" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Form Link (Google Forms, Typeform, etc.)</label>
                            <input type="url" class="form-control rounded-pill" name="form_link">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Status</label>
                            <select class="form-select rounded-pill" name="status" required>
                                <option value="draft">Active</option>
                                <option value="active">Upcoming</option>
                            </select>
                        </div>

                        <div class="mb-3 text-start">
                            <label for="tag-input-new-campaign" class="form-label fw-semibold">Tags</label>
                            <input name="tags" id="tag-input-new-campaign" class="form-control"
                                placeholder="Select or type tags..." >
                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="modal-footer px-4 pb-4 pt-2">
                        <button type="button" class="btn btn-outline-secondary rounded-pill px-4"
                            data-bs-dismiss="modal">Cancel</button>
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
