{{-- SUBSCRIPTION EXPIRING SOON MODAL --}}
@if (Auth::check())
    @php
        $daysLeft = now()->diffInDays(\Carbon\Carbon::parse(Auth::user()->expired_at), false);
    @endphp

    @if ($daysLeft > 0 && $daysLeft <= 3)
        <div class="modal fade" id="expiredModal" tabindex="-1" aria-labelledby="expiredModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 shadow">
                    <div class="modal-header" style="background-color: #ff0084;">
                        <h5 class="modal-title text-white fw-bold" id="expiredModalLabel">
                            Subscription Expiring Soon ⏳
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="border rounded p-3 bg-light-subtle">
                            <p class="fw-semibold text-dark mb-2">Good Day Vibrants 👋</p>

                            <p class="text-muted mb-3" style="word-break: break-word; overflow-wrap: break-word;">
                                Your subscription will expire in
                                <strong>{{ \Carbon\Carbon::parse(Auth::user()->expired_at)->format('F j, Y') }}.</strong>
                                To renew and continue enjoying all features, please message us on Facebook.
                            </p>

                            <div class="text-center mt-3">
                                <a href="https://www.messenger.com/t/vibrant.club.ph?text=SUBSCRIPTION%20PRICE"
                                    target="_blank" class="btn btn-primary rounded-pill px-4">
                                    💬 Message Us on Messenger
                                </a>
                            </div>

                            <p class="mt-4 text-muted mb-0 text-center">
                                Don’t miss out on all the vibrant connections! 🌟
                            </p>
                        </div>
                    </div>
                    <div class="modal-footer border-0 px-4 pb-4 justify-content-center">
                        <button type="button" class="btn btn-vibrant-outline rounded-pill px-4"
                            data-bs-dismiss="modal">
                            Maybe Later
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Your original script with "show once" addition --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const userId = "{{ Auth::id() }}";
                const storageKey = `expiringModalShown_${userId}`;

                if (!localStorage.getItem(storageKey)) {
                    const expiredModal = new bootstrap.Modal(document.getElementById('expiredModal'));
                    expiredModal.show();
                    localStorage.setItem(storageKey, 'true');
                }
            });
        </script>
    @endif
@endif
