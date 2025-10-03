<head>
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
</head>