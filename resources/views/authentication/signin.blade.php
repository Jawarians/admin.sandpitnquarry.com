<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">

<x-head/>

<style>
    body {
        margin: 0;
        padding: 0;
        position: relative;
    }
    .auth {
        position: relative;
        width: 100%;
        min-height: 100vh;
    }
    .background-image-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 1;
    }
    .background-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform 0.8s ease-in-out;
        animation: gentle-zoom 20s infinite alternate;
    }
    @keyframes gentle-zoom {
        0% {
            transform: scale(1);
        }
        100% {
            transform: scale(1.1);
        }
    }
    .auth-right {
        position: relative;
        background-color: rgba(255, 255, 255, 0.9); /* White shading with opacity */
        border-radius: 16px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        margin: 100px;
        margin-left: auto; /* Push to the right side */
        max-width: 1000px; /* Limit width */
        max-height: 10000;
        z-index: 10;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        color: #333; /* Dark text color */
    }
    .auth-left {
        display: none !important;
    }
    
    /* Ensure input text is dark */
    .form-control {
        color: #212529 !important;
    }
    
    /* Add a dark overlay to enhance text visibility */
    .background-image-container::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        pointer-events: none;
    }
</style>

<body>

    <section class="auth d-flex flex-wrap justify-content-end align-items-center">
        <div class="background-image-container">
            <img src="https://storage.googleapis.com/snq-website-images/customer/Merchant.png" alt="Background Image" class="background-image">
        </div>
        <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
            <div class="max-w-464-px mx-auto w-100">
                <div>
                    <a href="{{ route('index') }}" class="mb-40 max-w-290-px">
                        <img src="https://storage.googleapis.com/snq-website-images/customer/Logo-1.png" alt="">
                    </a>
                    <h4 class="mb-12 text-dark">Sign In to your Account</h4>
                    <p class="mb-32 text-secondary text-lg">Welcome back! Please use your <strong>@sandpitnquarry.com</strong> email to sign in</p>
                </div>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="icon-field mb-16">
                        <span class="icon top-50 translate-middle-y text-primary">
                            <iconify-icon icon="mage:email"></iconify-icon>
                        </span>
                        <input type="email" name="email" class="form-control h-56-px bg-white radius-12 text-dark" placeholder="Email (@sandpitnquarry.com)" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <div class="text-danger mt-2">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="position-relative mb-20">
                        <div class="icon-field">
                            <span class="icon top-50 translate-middle-y text-primary">
                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                            </span>
                            <input type="password" name="password" class="form-control h-56-px bg-white radius-12 text-dark" id="your-password" placeholder="Password">
                        </div>
                        <span class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-primary" data-toggle="#your-password"></span>
                        @if ($errors->has('password'))
                            <div class="text-danger mt-2">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="">
                        <div class="d-flex justify-content-between gap-2">
                            <div class="form-check style-check d-flex align-items-center">
                                <input class="form-check-input border border-secondary" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label text-secondary" for="remember">Remember me </label>
                            </div>
                            <a href="{{ route('forgotPassword') }}" class="text-primary fw-medium">Forgot Password?</a>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary text-white text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32 fw-bold">Sign In</button>

                        <!-- Social logins removed -->
                    <div class="mt-32 text-center">
                        <p class="text-secondary">Only @sandpitnquarry.com email addresses are allowed</p>
                    </div>
                    <!-- <div class="mt-32 text-center text-sm">
                        <p class="mb-0 text-secondary">Don't have an account? <a href="{{ route('signup') }}" class="text-primary fw-semibold">Sign Up</a></p> -->

                </form>
            </div>
        </div>
    </section>

<x-script />

<script>
    // ================== Password Show Hide Js Start ==========
    document.addEventListener('DOMContentLoaded', function() {
        const togglePasswordButtons = document.querySelectorAll('.toggle-password');
        togglePasswordButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                this.classList.toggle('ri-eye-off-line');
                this.classList.toggle('ri-eye-line');
                const inputSelector = this.getAttribute('data-toggle');
                const inputField = document.querySelector(inputSelector);
                
                if (inputField.getAttribute('type') === 'password') {
                    inputField.setAttribute('type', 'text');
                } else {
                    inputField.setAttribute('type', 'password');
                }
            });
        });
    });
    // ========================= Password Show Hide Js End ===========================
</script>

</body>

</html>