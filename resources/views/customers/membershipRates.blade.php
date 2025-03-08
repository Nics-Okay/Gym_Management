@extends('layouts.customerLayout')

@section('title-main', 'Membership Rates') <!-- Define the title section first -->

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/customerCSS/ratesStyle.css') }}">
@endsection

@section('customerContent') <!-- Define the main content section -->
    @include('partials.customerTitle')
    <div class="membership-rates-main">
        <div class="ratesInfo-1">
            <h2>Membership Status: {{ $membershipStatus }}</h2>
            <p id="validity">{{ $message }}</p>
        </div>
        <p id="avail">Available Memberships</p>
        
        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
        @if(session('error'))
            <p style="color: red;">{{ session('error') }}</p>
        @endif

        <div class="product-list">
            @foreach ($rates as $rate)
                <a href="{{route('customer.avail', ['rate' => $rate])}}">
                    <div class="rates-data">
                        <h3>{{$rate->name}}</h3>
                    </div>
                    <div class="rates-data">
                        <p>Duration: {{ $rate->duration_value }} {{ $rate->duration_unit }}{{ $rate->duration_value > 1 ? 's' : '' }}</p>
                    </div>
                    <div class="rates-data">
                        <p>Membership Price: <b>$</b>{{$rate->price}}</p>
                    </div>
                    <div class="rates-data">
                        <p>Times Availed: {{$rate->availed_by}}</p>
                    </div>
                </a>
            @endforeach
    @endsection
</div>