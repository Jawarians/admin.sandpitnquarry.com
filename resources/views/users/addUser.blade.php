@extends('layout.layout')
@php
$title='Add User';
$subTitle = 'Add User';
$script = '<script>
    // ================== Image Upload Js Start ===========================
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#imagePreview").css("background-image", "url(" + e.target.result + ")");
                $("#imagePreview").hide();
                $("#imagePreview").fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });
    // ================== Image Upload Js End ===========================
</script>';
@endphp

@section('content')

<div class="card h-100 p-0 radius-12">
    <div class="card-body p-24">
        <div class="row justify-content-center">
            <div class="col-xxl-6 col-xl-8 col-lg-10">
                <div class="card border">
                    <div class="card-body">
                        <h6 class="text-md text-primary-light mb-16">Profile Image</h6>

                        <!-- Upload Image Start -->
                        <div class="mb-24 mt-16">
                            <div class="avatar-upload">
                                <div class="avatar-edit position-absolute bottom-0 end-0 me-24 mt-16 z-1 cursor-pointer">
                                    <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" hidden>
                                    <label for="imageUpload" class="w-32-px h-32-px d-flex justify-content-center align-items-center bg-primary-50 text-primary-600 border border-primary-600 bg-hover-primary-100 text-lg rounded-circle">
                                        <iconify-icon icon="solar:camera-outline" class="icon"></iconify-icon>
                                    </label>
                                </div>
                                <div class="avatar-preview">
                                    <div id="imagePreview"> </div>
                                </div>
                            </div>
                        </div>
                        <!-- Upload Image End -->

                        <form method="POST" action="{{ route('storeUser') }}">
                            @csrf
                            <div class="mb-20">
                                <label for="name" class="form-label fw-semibold text-primary-light text-sm mb-8">Full Name <span class="text-danger-600">*</span></label>
                                <input type="text" class="form-control radius-8" id="name" name="name" placeholder="Enter Full Name" required>
                            </div>
                            <div class="mb-20">
                                <label for="email" class="form-label fw-semibold text-primary-light text-sm mb-8">Email <span class="text-danger-600">*</span></label>
                                <input type="email" class="form-control radius-8" id="email" name="email" placeholder="Enter email address" required>
                            </div>
                            <div class="mb-20">
                                <label for="password" class="form-label fw-semibold text-primary-light text-sm mb-8">Password <span class="text-danger-600">*</span></label>
                                <input type="password" class="form-control radius-8" id="password" name="password" placeholder="Enter password" required>
                            </div>
                            <div class="mb-20">
                                <label for="number" class="form-label fw-semibold text-primary-light text-sm mb-8">Phone</label>
                                <input type="text" class="form-control radius-8" id="number" name="number" placeholder="Enter phone number">
                            </div>
                            <a href="javascript:history.back()" class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-56 py-11 radius-8">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary border border-primary-600 text-md px-56 py-12 radius-8">
                                Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection