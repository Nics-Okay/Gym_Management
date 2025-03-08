<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin PIN Verification</title>
    <link rel="stylesheet" href="{{ asset('css/adminPin.css') }}">

</head>
<body>
    <div class="pin-main">
        <div class="back">
            <div class="back-icon">
                <a href="{{ route('index') }}"><ion-icon name="chevron-back-outline"></ion-icon></a>
            </div>
        </div>
        <div class="pin-img">
            <img src="{{ asset('tempPics/blapuz.jpg') }}" alt="img">
        </div>
        <div class="pin-content">
            <h1>Enter Admin PIN</h1>
            <form action="{{ route('admin.pin.verify') }}" method="POST">
                <!-- VIEW[admin.pin]->>ROUTE[admin.pin.verify] -->
                @csrf
                <label for="admin_code">PIN:</label>
                <input type="password" name="admin_code" id="admin_code" required>
                <button type="submit">Verify</button>
            </form>

            @if ($errors->has('admin_code'))
                <p style="color: red;">{{ $errors->first('admin_code') }}</p>
            @endif
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
