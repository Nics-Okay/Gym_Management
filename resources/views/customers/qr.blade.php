@extends('layouts.customerLayout')

@section('title-main', 'My QR Code') <!-- Define the title section first -->

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/customerCSS/qrStyle.css') }}">
@endsection

@section('customerContent') <!-- Define the main content section -->
    @include('partials.customerTitle')
    <div class="qr-main">
        <div class="qr-enclosure">
            <div>
                {!! $qrCode !!}
            </div>
        </div>
    </div>
@endsection