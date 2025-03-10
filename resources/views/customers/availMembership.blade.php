@extends('layouts.customerLayout')

@section('title-main', 'Membership Confirmation')

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/customerCSS/ratesStyle.css') }}">
@endsection

@section('customerContent') <!-- Define the main content section -->
    @include('partials.customerTitle')
    <div class="avail-membership">
        <div class="avail-membership-confirmation">
            <h2>Confirm Payment</h2>
            <div class="avail-membership-review">
                <p id="review">
                    Review membership details:
                </p>
                <h3>{{ $rates->name }}</h3>
                <p>Duration: {{ $rates->duration_value }} {{ $rates->duration_unit }} (s)</p>
                <p>Valid Until: {{ $validity }}</p>
                <p>Updated validity after availing: {{ $total_validity }}</p>
                <p>Membership Price: <b>$</b>{{ $rates->price }}</p>
            </div>
            <h2 id="provide-required">
               Provide required information:
            </h2>
            <form action="{{ route('transactions.store') }}" method="POST">
                @csrf
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" required>
                </div>

                <div>
                    <label for="contact_number">Contact Number</label>
                    <input type="text" name="contact_number" id="contact_number" value="{{ $contact_number }}" required autofocus>
                </div>
                
                <div>
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" value="{{ $address }}" required>
                </div>

                <!-- Hidden input to send the selected rate -->
                <input type="hidden" name="rate_id" value="{{ $rates->id }}">

                <button type="submit">Proceed</button>
            </form>
        </div>
    </div>
@endsection