<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="{{ asset('css/webLoginLogout.css') }}">
        <link rel="stylesheet" href="{{ asset('css/mobileLoginLogout.css') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="guestContainer">
            {{ $slot }}
        </div>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
