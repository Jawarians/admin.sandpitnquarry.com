@extends('layout.layout')
@php
    $title = 'Edit User';
    $subTitle = 'Edit User';
@endphp

@section('content')

<div class="card h-100 p-0 radius-12">
    <div class="card-header border-bottom bg-base py-16 px-24">
        <div class="d-flex align-items-center flex-wrap gap-3 justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('usersList') }}" class="btn btn-outline-primary text-sm btn-sm px-12 py-12 radius-8 d-flex align-items-center gap-2">
                    <iconify-icon icon="ic:baseline-arrow-back" class="icon text-xl line-height-1"></iconify-icon>
                    Back to Users
                </a>
                <h6 class="text-lg mb-0">Edit User: {{ $user->name }}</h6>
            </div>
        </div>
    </div>
    <div class="card-body p-24">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('updateUser', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row gy-4">
                <!-- Profile Photo Section -->
                <div class="col-12">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="position-relative">
                            @if($user->profile_photo_path)
                                <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="{{ $user->name }}" id="profilePreview" class="w-100-px h-100-px rounded-circle object-fit-cover border">
                            @else
                                <img src="{{ asset('assets/images/user.png') }}" alt="{{ $user->name }}" id="profilePreview" class="w-100-px h-100-px rounded-circle object-fit-cover border">
                            @endif
                        </div>
                        <div>
                            <h6 class="text-md mb-2">Profile Photo</h6>
                            <input type="file" class="form-control" id="profile_photo" name="profile_photo" accept="image/*" onchange="previewImage(this)">
                            <small class="text-muted">Upload JPG, PNG, GIF (Max: 2MB)</small>
                        </div>
                    </div>
                </div>

                <!-- Basic Information -->
                <div class="col-md-6">
                    <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">Full Name <span class="text-danger-600">*</span></label>
                    <input type="text" class="form-control radius-8" id="name" name="name" value="{{ old('name', $user->name) }}" placeholder="Enter full name" required>
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label fw-semibold text-primary-light text-sm mb-8">Email Address <span class="text-danger-600">*</span></label>
                    <input type="email" class="form-control radius-8" id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Enter email address" required>
                </div>

                <div class="col-md-6">
                    <label for="department" class="form-label fw-semibold text-primary-light text-sm mb-8">Department</label>
                    <input type="text" class="form-control radius-8" id="department" name="department" value="{{ old('department', $user->department) }}" placeholder="Enter department">
                </div>

                <div class="col-md-6">
                    <label for="designation" class="form-label fw-semibold text-primary-light text-sm mb-8">Designation</label>
                    <input type="text" class="form-control radius-8" id="designation" name="designation" value="{{ old('designation', $user->designation) }}" placeholder="Enter designation">
                </div>

                <!-- User Information Display -->
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Join Date</label>
                            <input type="text" class="form-control radius-8" value="{{ $user->created_at ? $user->created_at->format('d M Y, h:i A') : 'N/A' }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold text-primary-light text-sm mb-8">Email Verification Status</label>
                            <input type="text" class="form-control radius-8" value="{{ $user->email_verified_at ? 'Verified' : 'Not Verified' }}" readonly>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="col-12">
                    <div class="d-flex align-items-center gap-3">
                        <button type="submit" class="btn btn-primary text-sm btn-sm px-24 py-12 radius-8">
                            <iconify-icon icon="ic:baseline-save" class="icon text-lg me-2"></iconify-icon>
                            Update User
                        </button>
                        <a href="{{ route('viewProfile', $user->id) }}" class="btn btn-outline-secondary text-sm btn-sm px-24 py-12 radius-8">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profilePreview').src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

@endsection