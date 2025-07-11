{{-- MODAL --}}
<div class="modal fade" id="campaignModal{{ $campaign->id }}" tabindex="-1"
    aria-labelledby="campaignModalLabel{{ $campaign->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header" style="background-color: #ff0084;">
                <h5 class="modal-title text-white fw-bold" id="campaignModalLabel{{ $campaign->id }}">
                    {{ $campaign->title }}
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body px-4 py-3">
                <div class="border rounded p-2 bg-light-subtle">
                    <p class="text-muted mb-0">
                        {!! nl2br(e($campaign->description)) !!}
                    </p>
                </div>
            </div>
            <div class="modal-footer border-0 px-4 pb-4 justify-content-center">
                <a href="{{ $campaign->form_link }}" target="_blank" class="btn btn-vibrant-outline rounded-pill px-4">
                    Enter Campaign
                </a>
            </div>
        </div>
    </div>
</div>
