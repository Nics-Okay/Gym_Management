<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="{{ asset('css/customerCSS/homepageStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customerCSS/settingsStyle.css') }}">
    @yield('custom_css')
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <div class="main-page">
        <!-- HEADER -->
        @include('partials.customerHeader')

        <div class="main-content">
            <!-- HEADER -->
            @yield('customerContent')
        </div>

        <!-- HEADER -->
        @include('partials.customerNavigation')
    </div>
    <script src="{{ asset('js//customerJS/homepageScript.js') }}"></script> 
</body>
</html>