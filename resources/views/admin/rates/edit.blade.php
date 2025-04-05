@extends('layouts.dashboardLayout')

@section('head-access')
    <link rel="stylesheet" href="{{ asset('css/modulesCSS/universalCRUD.css') }}">
@endsection

@section('content')
    <div class="universal-div">
        <div class="universal-div-main">
            <h3 class="universal-div-header">Edit Rate Information</h3>
            <div>
                @if(session()->has('success'))
                    <div>
                        {{session('success')}}
                    </div>
                @endif
            </div>
            <div class="universal-div-content">
                <form method="post" action="{{ route('rates.update', ['rate' => $rate]) }}">
                    @csrf
                    @method('put')
                    <div class="label">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" placeholder="Name" value="{{$rate->name}}" required>
                    </div>
                    <div class="label">
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
                    <div class="label">
                        <label for="price">Price:</label>
                        <input type="text" name="price" id="price" placeholder="Price" value="{{$rate->price}}" required>
                    </div>
                    <div class="submit-button">
                        <input type="submit" value="Confirm">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection