{{-- DAILY ANNOUNCEMENT MODAL --}}
<div class="modal fade" id="dailyAnnouncementModal" tabindex="-1" aria-labelledby="dailyAnnouncementLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header" style="background-color: #ff0084;">
                <h5 class="modal-title text-white fw-bold" id="dailyAnnouncementLabel">
                    Daily Greetings Vibrants!🌟
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-2">
                <div class="border rounded p-3 bg-light-subtle">
                    <p class="fw-semibold text-dark mb-2">Hello Vibrants! 👋</p>

                    <p class="text-muted mb-0" style="word-break: break-word; overflow-wrap: break-word;">
                        We hope you're shining bright today! ✨ Here's your daily dose of inspiration and updates from Vibrant Club PH.
                    </p>


                    <hr>
                    <p id="quoteText" class="text-muted mb-0"
                        style="word-break: break-word; overflow-wrap: break-word;">
                        Loading your quote... ✨
                    </p>
                    <hr>

                </div>
            </div>
            <div class="modal-footer border-0 px-4 pb-4 justify-content-center">
                <button type="button" class="btn btn-vibrant-outline rounded-pill px-4" data-bs-dismiss="modal">
                    Let's Make Today Vibrant!
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modalShownKey = 'dailyAnnouncementShown';
        const today = new Date().toISOString().split('T')[0];

        if (localStorage.getItem(modalShownKey) !== today) {
            // Fetch quote from Laravel proxy route
            fetch('/daily-quote')
                .then(res => res.json())
                .then(data => {
                    const quote = data[0]?.q || "Stay positive and keep growing.";
                    const author = data[0]?.a || "Anonymous";

                    // Insert the quote into the modal
                    document.getElementById('quoteText').innerHTML = `
                        “${quote}”<br><span class="fst-italic text-end d-block mt-2">– ${author}</span>
                    `;
                }).catch(() => {
                    document.getElementById('quoteText').innerText =
                        "Couldn't load quote. Just be awesome today!";
                });

            // Show modal and set localStorage
            const dailyModal = new bootstrap.Modal(document.getElementById('dailyAnnouncementModal'));
            dailyModal.show();
            localStorage.setItem(modalShownKey, today);
        }
    });
</script>
