<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @yield('head-access')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div class="dashboard-main">
        <!-- MENU AREA -->
        @include('partials.menu')

        <div class="dashboard-layout">
            <!-- HEADER AREA -->
            <div class="dashboard-header">
                @include('partials.header')
            </div>

            <!-- CONTENT AREA -->
            <div class="dashboard-content">
                @yield('content')
            </div>
        </div>
    </div> 
    <script src="{{ asset('js/adminJS/dashboard.js') }}"></script> 
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>