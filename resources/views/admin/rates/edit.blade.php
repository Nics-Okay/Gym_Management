<!DOCTYPE html>
<html>
<head>
    <title>Create Rate</title>
</head>
<body>
    <h1>Edit Rate</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="post" action="{{ route('rates.update', ['rate' => $rate]) }}">
        @csrf
        @method('put')
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" placeholder="Name" value="{{$rate->name}}" required>
        </div>
        <div>
            <label for="duration">Duration:</label>
            <!-- Hidden fields for splitting value and unit -->
            <select name="duration_option" id="duration_option" required>
                <option value="1_day" {{ ($rate->duration_value == 1 && $rate->duration_unit == 'day') ? 'selected' : '' }}>1 day</option>
                <option value="7_day" {{ ($rate->duration_value == 7 && $rate->duration_unit == 'day') ? 'selected' : '' }}>7 days</option>
                <option value="15_day" {{ ($rate->duration_value == 15 && $rate->duration_unit == 'day') ? 'selected' : '' }}>15 days</option>
                <option value="1_month" {{ ($rate->duration_value == 1 && $rate->duration_unit == 'month') ? 'selected' : '' }}>1 month</option>
                <option value="6_month" {{ ($rate->duration_value == 6 && $rate->duration_unit == 'month') ? 'selected' : '' }}>6 months</option>
                <option value="1_year" {{ ($rate->duration_value == 1 && $rate->duration_unit == 'year') ? 'selected' : '' }}>1 year</option>
            </select>
            <p>
                <!-- Instruction: For example, if you choose "1" and "day" it will be "1 day",
                choose "7" and "day" it will be "7 days", etc. -->
            </p>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" placeholder="Price" value="{{$rate->price}}" required>
        </div>
        <button type="submit">Update Rate</button>
    </form>
</body>
</html>
