<!DOCTYPE html>
<html>
<head>
    <title>Create Rate</title>
</head>
<body>
    <h1>Create a Rate</h1>
    <div>
        {{-- Line of codes to print error if there's any --}}
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="POST" action="{{ route('rates.store') }}">
        @csrf
        @method('post')
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="duration">Duration:</label>
            <!-- Hidden fields for splitting value and unit -->
            <select name="duration_option" id="duration_option" required>
                <option value="1_day">1 day</option>
                <option value="7_day">7 days</option>
                <option value="15_day">15 days</option>
                <option value="1_month">1 month</option>
                <option value="6_month">6 months</option>
                <option value="1_year">1 year</option>
            </select>
            <p>
                <!-- Instruction: For example, if you choose "1" and "day" it will be "1 day",
                choose "7" and "day" it will be "7 days", etc. -->
            </p>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" required>
        </div>
        <button type="submit">Create Rate</button>
    </form>
</body>
</html>
