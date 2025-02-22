<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="{{ asset('css/dashStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashContent.css') }}">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <div class="main-page">
        @include('partials.menu')
        <div class="main-content">
            @include('partials.header')
            <script src="{{ asset('js/script.js') }}"></script> 
            <div class="page-layout">
                @yield('content')
                <script src="{{ asset('js/script.js') }}"></script> 
            </div>
        </div>
    </div> 
</body>
</html>