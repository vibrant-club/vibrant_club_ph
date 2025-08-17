{{-- SOCIAL SUPPORT MODAL --}}
<div class="modal fade" id="supportModal" tabindex="-1" aria-labelledby="supportModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header" style="background-color: #ff0084;">
                <h5 class="modal-title text-white fw-bold" id="supportModalLabel">
                    Can I Get a Favor 💖
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="border rounded p-3 bg-light-subtle">
                    <p class="fw-semibold text-dark mb-2">Hi Vibrants 👋</p>

                    <p class="text-muted mb-3" style="word-break: break-word; overflow-wrap: break-word;">
                        Kindly support our growing community by doing two small things:
                    </p>

                    <ul class="list-unstyled text-muted">
                        <li>👍 Like our Facebook Page:
                            <a href="https://www.facebook.com/vibrant.club.ph/" target="_blank"
                                class="fw-bold text-decoration-none text-primary">
                                facebook.com/vibrant.club.ph
                            </a>
                        </li>
                        <br>
                        <li>👥 Join our Facebook Group:
                            <a href="https://www.facebook.com/groups/vibrant.club.ph" target="_blank"
                                class="fw-bold text-decoration-none text-success">
                                facebook.com/groups/vibrant.club.ph
                            </a>
                        </li>
                    </ul>

                    <p class="mt-3 text-muted mb-0">
                        Your support helps us reach more amazing people like you! ✨
                    </p>
                </div> 
            </div>
            <div class="modal-footer border-0 px-4 pb-4 justify-content-center">
                <button type="button" class="btn btn-vibrant-outline rounded-pill px-4" data-bs-dismiss="modal">
                    Sure! Happy to Help 😊
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const supportModalKey = 'supportModalShown';
        const today = new Date().toISOString().split('T')[0];

        if (localStorage.getItem(supportModalKey) !== today) {
            setTimeout(() => {
                const supportModal = new bootstrap.Modal(document.getElementById('supportModal'));
                supportModal.show();
                localStorage.setItem(supportModalKey, today);
            }, 60000); // 60 seconds = 1 minute
        }
    });
</script>
