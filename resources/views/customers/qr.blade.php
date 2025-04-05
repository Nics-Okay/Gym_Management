@extends('layouts.customerLayout')

@section('title-main', 'Membership Verification') <!-- Define the title section first -->

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('css/customerCSS/qrStyle.css') }}">
@endsection

@section('customerContent') <!-- Define the main content section -->
    @include('partials.customerTitle')
    <div class="qr-main">
        <h1>QR CODE FOR ENTRY</h1>
        <div class="qr-enclosure">
            <div>
                {!! $qrCode !!}
            </div>
        </div>
        <div class="expiration-remind">
            <p>Membership Expiration Reminder</p>
        </div>
        <div class="reminder">
          <div class="reminder-icon"><i class="fa-solid fa-triangle-exclamation"></i></div> 
         <p>Your membership will expire on {{ $membershipValidity }}. Please renew your membership to continue enjoying the benefits</p>
        </div>
    </div>
@endsection