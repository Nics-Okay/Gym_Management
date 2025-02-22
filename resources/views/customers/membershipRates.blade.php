@extends('layouts.customerLayout')

@section('title-main', 'Membership Rates') <!-- Define the title section first -->

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/customerCSS/ratesStyle.css') }}">
@endsection

@section('customerContent') <!-- Define the main content section -->
    @include('partials.customerTitle')
    <div class="ratesInfo-1">

    </div>
    <div class="ratesInfo-2">
    <div class="product-list">
        @foreach ($rates as $rate)
            <div class="rates-selection">
                <a href="#">
                    <h3>{{$rate->name}}</h3>
                    <p>Duration: {{ $rate->duration_value }} {{ $rate->duration_unit }}{{ $rate->duration_value > 1 ? 's' : '' }}</p>
                    <p>Price: ${{$rate->price}}</p>
                    <p>Times Availed: {{$rate->availed_by}}</p>
                </a>
            </div>
        @endforeach
    </div>
    </div>
    <div class="ratesInfo-3">

    </div>
    <div class="ratesInfo-4">

    </div>
    <div class="ratesInfo-5">

    </div>
    
@endsection