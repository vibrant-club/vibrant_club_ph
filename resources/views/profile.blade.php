@extends('layouts.app')

@section('content')
    <div class="container p-3 bg-white">
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="text-center fs-5 rounded shadow-sm p-3">
                <div class="position-relative mx-auto mb-2" style="width: 200px; height: 200px;">
                    <img id="profilePreview"
                        src="{{ Auth::user()->profile_image
                            ? asset('storage/profile_images/' . Auth::user()->profile_image)
                            : asset('images/logo3.png') }}"
                        class="rounded-circle w-100 h-100 border border-3 border-danger" style="object-fit: cover;"
                        alt="Profile Image">

                    <!-- Inset camera icon -->
                    <label for="profileImageInput" class="position-absolute"
                        style="bottom: 10px; right: 10px; background: rgba(0,0,0,0.7); padding: 8px; border-radius: 50%; cursor: pointer;">
                        <i class="fas fa-camera text-white"></i>
                    </label>

                    <input type="file" id="profileImageInput" name="profile_image" accept="image/*" class="d-none"
                        onchange="document.getElementById('profilePreview').src = window.URL.createObjectURL(this.files[0])">
                </div>



                <div class="lh-sm">
                    <span class="fs-3 fw-bold">{{ Auth::user()->firstname }} {{ Auth::user()->middlename }}
                        {{ Auth::user()->lastname }}</span> <br>
                    <span class="fs-5">{{ Auth::user()->email }}</span>
                </div>

                <div class="mt-3">
                    <label class="fw-semibold d-block mb-1">Introduction</label>
                    <textarea class="form-control" name="about" rows="4" placeholder="Write something about yourself...">{{ old('about', Auth::user()->about) }}</textarea>
                </div>
            </div>

            <div class="text-start p-3 fs-5 rounded shadow-sm">
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="fa-solid fa-address-book fs-5"></i>
                        </span>
                        <input type="text" name="vibrant_username" class="form-control border-start-0"
                            placeholder="@Vibrant_Username"
                            value="{{ old('vibrant_username', Auth::user()->vibrant_username) }}">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="fab fa-facebook text-primary fs-5"></i>
                        </span>
                        <input type="text" name="facebook" class="form-control border-start-0"
                            placeholder="Facebook profile link" value="{{ old('facebook', Auth::user()->facebook) }}">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="fab fa-instagram text-danger fs-5"></i>
                        </span>
                        <input type="text" name="instagram" class="form-control border-start-0"
                            placeholder="Instagram profile link" value="{{ old('instagram', Auth::user()->instagram) }}">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="fab fa-tiktok text-dark fs-5"></i>
                        </span>
                        <input type="text" name="tiktok" class="form-control border-start-0"
                            placeholder="Tiktok profile link" value="{{ old('tiktok', Auth::user()->tiktok) }}">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="fab fa-twitter text-info fs-5"></i>
                        </span>
                        <input type="text" name="twitter" class="form-control border-start-0"
                            placeholder="Twitter profile link" value="{{ old('twitter', Auth::user()->twitter) }}">
                    </div>
                </div>

                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="fab fa-youtube text-danger fs-5"></i>
                        </span>
                        <input type="text" name="youtube" class="form-control border-start-0"
                            placeholder="Youtube profile link" value="{{ old('youtube', Auth::user()->youtube) }}">
                    </div>
                </div>

                <div class="text-start mt-4">
                    <button type="submit" class="btn btn-md btn-outline-vibrant px-4">
                        <i class="fas fa-save me-2"></i> Save Changes
                    </button>

                    <button type="button" class="btn btn-md btn-outline-vibrant px-4"
                        onclick="copyProfileLink('{{ route('profile.public', ['vibrant_username' => Auth::user()->vibrant_username]) }}')">
                        <i class="fas fa-share-alt me-2"></i> Share
                    </button>
                </div>



            </div>
        </form>
    </div>


    <script>
        function copyProfileLink(url) {
            navigator.clipboard.writeText(url).then(function() {
                // Show confirmation popup
                alert("Link copied to clipboard:\n" + url);
            }, function(err) {
                console.error('Failed to copy: ', err);
                alert("Failed to copy the link.");
            });
        }
    </script>
@endsection
