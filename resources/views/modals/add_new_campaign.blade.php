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
                            <label class="form-label fw-semibold">Rate Per Influencer</label>
                            <div class="input-group">
                                <input type="number" class="form-control rounded-pill" name="budget_per_influencer"
                                    min="0" step="0.01" id="budgetInput" required>
                                <div class="input-group-text bg-white border-0 ps-3">
                                    <input type="checkbox" id="budgetNA" class="form-check-input mt-0 ms-2">
                                    <label for="budgetNA" class="form-check-label ms-1">N/A</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Total Influencers Needed</label>
                            <div class="input-group">
                                <input type="number" class="form-control rounded-pill" name="total_influencers"
                                    min="1" id="influencersInput" required>
                                <div class="input-group-text bg-white border-0 ps-3">
                                    <input type="checkbox" id="influencersNA" class="form-check-input mt-0 ms-2">
                                    <label for="influencersNA" class="form-check-label ms-1">N/A</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Deadline For Submission</label>
                        <input type="date" class="form-control rounded-pill" name="deadline" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Form Link (Google Forms, Typeform, etc.)</label>
                        <input type="text" class="form-control rounded-pill" name="form_link">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Status</label>
                        <select class="form-select rounded-pill" name="status" required>
                            <option value="active">Active</option>
                            <option value="upcoming">Upcoming</option>
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

                    <button type="submit" class="btn text-white rounded-pill px-4" style="background-color: #ff0084;">
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



    const budgetCheckbox = document.getElementById('budgetNA');
    const influencersCheckbox = document.getElementById('influencersNA');
    const budgetInput = document.getElementById('budgetInput');
    const influencersInput = document.getElementById('influencersInput');

    budgetCheckbox.addEventListener('change', function() {
        budgetInput.disabled = this.checked;
        budgetInput.required = !this.checked;
        if (this.checked) budgetInput.value = '';
    });

    influencersCheckbox.addEventListener('change', function() {
        influencersInput.disabled = this.checked;
        influencersInput.required = !this.checked;
        if (this.checked) influencersInput.value = '';
    });

    // Ensure disabled inputs still submit null values
    document.querySelector('form').addEventListener('submit', function() {
        if (budgetCheckbox.checked) {
            budgetInput.disabled = false; // Re-enable to submit value
            budgetInput.value = '';
        }
        if (influencersCheckbox.checked) {
            influencersInput.disabled = false;
            influencersInput.value = '';
        }
    });
</script>
