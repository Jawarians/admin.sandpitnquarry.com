
<head>
    <style>
    body {
        margin: 0;
        padding: 0;
        position: relative;
        font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    }
    .auth {
        position: relative;
        width: 100%;
        min-height: 100vh;
        background-color: #f8f9fa;
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
        filter: brightness(0.9) contrast(1.1);
        transition: transform 0.8s ease-in-out;
        animation: gentle-zoom 20s infinite alternate;
    }
    
    @keyframes gentle-zoom {
        0% {
            transform: scale(1);
        }
        100% {
            transform: scale(1.05);
        }
    }
    .auth-right {
        position: relative;
        background-color: rgba(255, 255, 255, 0.95);
        border-radius: 8px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        margin: 20px;
        max-width: 500px;
        z-index: 10;
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        color: #333;
        padding: 40px !important;
        border-left: 4px solid #0d6efd;
    }
    .auth-left {
        display: none !important;
    }
    
    /* Form styling */
    .form-control {
        color: #212529 !important;
        border: 1px solid #dee2e6;
        transition: border-color 0.2s, box-shadow 0.2s;
        padding-left: 45px !important;
        font-size: 15px;
    }
    
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, 0.2);
    }
    
    .icon-field {
        position: relative;
    }
    
    .icon-field .icon {
        left: 15px;
        z-index: 10;
        font-size: 18px;
    }
    
    /* Background overlay */
    .background-image-container::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0.7) 100%);
        pointer-events: none;
    }
    
    /* Checkbox styling */
    .form-check-input {
        width: 18px !important;
        height: 18px !important;
        border: 1px solid #ced4da !important;
        box-shadow: none !important;
        background-color: #fff !important;
    }
    
    .form-check-input:checked {
        background-color: #0d6efd !important;
        border-color: #0d6efd !important;
    }
    
    .form-check-label {
        font-size: 14px;
        color: #495057 !important;
        font-weight: 400 !important;
    }
    
    /* Button styling */
    .btn-primary {
        background-color: #0d6efd;
        border-color: #0d6efd;
        box-shadow: 0 2px 5px rgba(13, 110, 253, 0.2);
        transition: all 0.2s ease;
        font-weight: 500 !important;
        letter-spacing: 0.3px;
    }
    
    .btn-primary:hover {
        background-color: #0b5ed7;
        border-color: #0b5ed7;
        box-shadow: 0 4px 8px rgba(13, 110, 253, 0.3);
        transform: translateY(-1px);
    }
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SNQ Admin Panel</title>
    <link rel="icon" type="image/png"  href="https://storage.googleapis.com/snq-website-images/customer/Logo-1.png" sizes="16x16">
    
    <!-- Anti-flash script - prevents white flash during page transitions -->
    <script>
        (function() {
            // Theme colors - must match CSS variables in page-transition.css
            var darkBgColor = '#252b3b'; // Dark blue color from your dashboard
            var lightBgColor = '#f5f7fb'; // Light color for light theme
            
            // Get theme from localStorage (same as in app.js)
            var currentTheme = localStorage.getItem('theme');
            
            // Apply theme logic: 
            // 1. Use stored theme if available
            // 2. Check for OS level preference as fallback
            // 3. Default to 'dark' based on your dashboard design
            if (!currentTheme) {
                if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    currentTheme = 'dark';
                } else if (window.matchMedia && window.matchMedia('(prefers-color-scheme: light)').matches) {
                    currentTheme = 'light';
                } else {
                    currentTheme = 'dark'; // Default to dark based on dashboard
                }
            }
            
            // Set the appropriate background color based on theme
            var bgColor = currentTheme === 'dark' ? darkBgColor : lightBgColor;
            
            // Apply theme to HTML element immediately (before any rendering)
            document.documentElement.setAttribute('data-theme', currentTheme);
            document.documentElement.style.backgroundColor = bgColor;
            document.documentElement.style.color = currentTheme === 'dark' ? '#fff' : '#333';
            
            // Create and inject critical style to avoid flash during load
            var style = document.createElement('style');
            style.textContent = 
                'html, body { background-color: ' + bgColor + ' !important; } ' +
                '.page-transitioning { background-color: ' + bgColor + ' !important; }';
            document.head.appendChild(style);
        })();
    </script>
    <!-- remix icon font css  -->
    <link rel="stylesheet"  href="{{ asset('assets/css/remixicon.css') }}">
    <!-- BootStrap css -->
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/bootstrap.min.css') }}">
    <!-- Apex Chart css -->
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/apexcharts.css') }}">
    <!-- Data Table css -->
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/dataTables.min.css') }}">
    <!-- Text Editor css -->
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/editor-katex.min.css') }}">
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/editor.atom-one-dark.min.css') }}">
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/editor.quill.snow.css') }}">
    <!-- Date picker css -->
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/flatpickr.min.css') }}">
    <!-- Calendar css -->
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/full-calendar.css') }}">
    <!-- Vector Map css -->
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/jquery-jvectormap-2.0.5.css') }}">
    <!-- Popup css -->
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/magnific-popup.css') }}">
    <!-- Slick Slider css -->
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/slick.css') }}">
    <!-- prism css -->
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/prism.css') }}">
    <!-- file upload css -->
    <link rel="stylesheet"  href="{{ asset('assets/css/lib/file-upload.css') }}">

    <link rel="stylesheet"  href="{{ asset('assets/css/lib/audioplayer.css') }}">
    <!-- main css -->
    <link rel="stylesheet"  href="{{ asset('assets/css/style.css') }}">
    <!-- page transition css -->
    <link rel="stylesheet"  href="{{ asset('assets/css/page-transition.css') }}">
     {{-- allow views to push page-specific styles/scripts into the head --}}
    @stack('head')
</head>