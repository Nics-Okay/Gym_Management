<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin PIN Verification</title>
</head>
<body>
    <div style="background-color: #021024;">
        <h1>Enter Admin PIN</h1>
        <form action="{{ route('admin.pin.verify') }}" method="POST">
            <!-- VIEW[admin.pin]->>ROUTE[admin.pin.verify] -->
            @csrf
            <label for="admin_pin">PIN:</label>
            <input type="password" name="admin_pin" id="admin_pin" required>
            <button type="submit">Verify</button>
        </form>

        @if ($errors->has('admin_pin'))
            <p style="color: red;">{{ $errors->first('admin_pin') }}</p>
        @endif
    </div>
</body>
</html>
