@extends('layouts.dashboardLayout')

@section('head-access')
    <link rel="stylesheet" href="{{ asset('css/modulesCSS/universalCRUD.css') }}">
@endsection

@section('content')
    <div class="universal-div">
        <div class="universal-div-main">
            <h3 class="universal-div-header">Create New Rate</h3>
            <div>
                @if(session()->has('success'))
                    <div>
                        {{session('success')}}
                    </div>
                @endif
            </div>
            <div class="universal-div-content">
                <form method="POST" action="{{ route('rates.store') }}">
                    @csrf
                    @method('post')
                    <div class="label">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" required>
                    </div>
                    <div class="label">
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
                    <div class="label">
                        <label for="price">Price:</label>
                        <input type="text" name="price" id="price" required>
                    </div>
                    <div class="submit-button">
                        <input type="submit" value="Confirm">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
