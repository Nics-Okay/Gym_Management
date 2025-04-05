@extends('layouts.dashboardLayout')

@section('content')
<div class="dashboard-section">
    <div class="page-info">
        <h2>Dashboard</h2>
    </div>
    <div class="page-menus">
        <a href="#" class="menu-link">
            <div class="page-menu">
                <div class="menu-title">TOTAL MEMBERS</div>
                <div class="menu-info">{{ $membersCount }}</div>
            </div>
            <div class="page-icon">
                <div class="menu-icon"><ion-icon name="people"></ion-icon></div>
            </div>
        </a>
        <a href="#" class="menu-link">
            <div class="page-menu">
                <div class="menu-title">ACTIVE MEMBERS</div>
                <div class="menu-info">{{ $activeMembersCount }}</div>
            </div>
            <div class="page-icon">
                <div class="menu-icon"><ion-icon name="accessibility"></ion-icon></div>
            </div>
        </a>
        <a href="#" class="menu-link">
            <div class="page-menu">
                <div class="menu-title">DAILY ATTENDEE'S</div>
                <div class="menu-info">{{ $attendeeDaily }}</div>
            </div>
            <div class="page-icon">
                <div class="menu-icon"><ion-icon name="footsteps"></ion-icon></div>
            </div>
        </a>
        <a href="#" class="menu-link">
            <div class="page-menu">
                <div class="menu-title">MONTHLY ATTENDEE'S</div>
                <div class="menu-info">{{ $attendeeMonthly }}</div>
            </div>
            <div class="page-icon">
                <div class="menu-icon"><i class="fa-solid fa-people-roof"></i></div>
            </div>
        </a>
        <a href="#" class="menu-link">
            <div class="page-menu">
                <div class="menu-title">MONTHLY INCOME</div>
                <div class="menu-info">₱ {{ $income }}.00</div>
            </div>
            <div class="page-icon">
                <div class="menu-icon"><ion-icon name="wallet"></ion-icon></div>
            </div>
        </a>
        <a href="#" class="menu-link">
            <div class="page-menu">
                <div class="menu-title">PENDING PAYMENTS</div>
                <div class="menu-info">{{ $pendingTransaction }}</div>
            </div>
            <div class="page-icon">
                <div class="menu-icon"><i class="fa-solid fa-hand-holding-dollar"></i></div>
            </div>
        </a>
    </div>
    <div class="page-content">
        <h1>Revenue and Visitors Report</h1>
        <div class="dashboard-report">
            <div class="dashboard-chart">

            </div>
            <div class="dashboard-chart">

            </div>
        </div>
    </div>
</div>
@include('partials.infoside')
@endsection