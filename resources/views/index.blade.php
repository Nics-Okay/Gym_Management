<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Boss Lapuz Gym</title>
    <link rel="stylesheet" href="{{ asset('css/indexStyle.css') }}">
</head>
<body>
    <div class="indexMain">
        @if(session('error'))
        <div style="color: red; position:absolute;">
            {{ session('error') }}
        </div>
        @endif
        <div class="indexContent">
            <img src="{{ asset('tempPics/indexLogo.png') }}" alt="Boss Lapuz">
            <h1>Welcome</h1>
            <p>Fitness begins here</p>
            @if (Route::has('login'))
                @auth
                    <a href="{{ route('filter') }}">PROCEED</a>
                    @else
                        <a href="{{ route('login') }}">GET STARTED</a>
                @endauth
            @endif
        </div>
    </div>
</body>
</html>