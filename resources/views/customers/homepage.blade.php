@extends('layouts.customerLayout')

@section('customerContent')
<div class="content-title">
    <h1>Home</h1>
</div>
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
@endsection