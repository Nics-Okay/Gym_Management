@extends('layouts.customerLayout')

@section('title-main', 'Home')

@section('customerContent')
    @include('partials.customerTitle')
    <div class="section-top">
        <div class="section-top-title">
            <h1>Welcome to Boss Lapuz Fitness Gym</h1>
        </div>
        <div class="section-top-image">
            <div class="section-top-image-holder">
                <img src="{{ asset('tempPics/blapuz.jpg') }}" alt="Boss Lapuz Gym">
            </div>
        </div>
    </div>
    <div class="section-bottom">
        <div class="section-bottom-stats">
            <h2>Membership Status: {{ $member }}</h2>
        </div>
    </div>
@endsection

{{--

<div class="info-1">
    <div class="info-1-title">
        <h2>Current Weight</h2>
        <p id="current-weight" placeholder=>N/A</p>
    </div>
    <div class="info-1-button">
        <a href="#">Log</a>
    </div>
</div>
<div class="membership-status">
    <div class="membership-container">
        <div class="membership-title">
            <h2>Membership Status</h2>
            <div class="membership-icon"></div>
        </div>
        <div class="membership-info">
            <p></p>
        </div>
    </div>
</div>
<div class="progress-info">
    <h2>
        Chart
    </h2>
    <div class="progress-content"></div>
</div>
<div class="info-2">
    <h2>
        BMI
    </h2>
    <div class="info-2-content"></div>
</div>
--}}