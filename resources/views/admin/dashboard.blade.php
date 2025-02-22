@extends('layouts.dashLayout')

@section('content')
<div class="page-info">
    <h2>Dashboard Real</h2>
</div>
<div class="page-menus">
    <a href="#" class="menu-link">
        <div class="page-menu">
            <div class="menu-title">TODAY'S EARNINGS</div>
            <div class="menu-info">PHP 0.00</div>
        </div>
        <div class="page-icon">
            <div class="menu-icon"><ion-icon name="wallet"></ion-icon></div>
        </div>
    </a>
    <a href="#" class="menu-link">
        <div class="page-menu">
            <div class="menu-title">THIS MONTH'S EARNINGS</div>
            <div class="menu-info">PHP 0.00</div>
        </div>
        <div class="page-icon">
            <div class="menu-icon"><ion-icon name="stats-chart"></ion-icon></div>
        </div>
    </a>
    <a href="#" class="menu-link">
        <div class="page-menu">
            <div class="menu-title">ACTIVE MEMBERS</div>
            <div class="menu-info">24</div>
        </div>
        <div class="page-icon">
            <div class="menu-icon"><ion-icon name="fitness"></ion-icon></div>
        </div>
    </a>
    <a href="#" class="menu-link">
        <div class="page-menu">
            <div class="menu-title">ATTENDEE'S</div>
            <div class="menu-info">24</div>
        </div>
        <div class="page-icon">
            <div class="menu-icon"><ion-icon name="people"></ion-icon></div>
        </div>
    </a>
    <a href="#" class="menu-link">
        <div class="page-menu">
            <div class="menu-title">MEMBERSHIP REQUEST</div>
            <div class="menu-info">8</div>
        </div>
        <div class="page-icon">
            <div class="menu-icon"><ion-icon name="person-add"></ion-icon></div>
        </div>
    </a>
    <a href="#" class="menu-link" id="ml-deals">
        <div class="page-menu" id="pm-deals">
            <div class="menu-title" id="mt-deals">DEALS AND PROMOS</div>
        </div>
        <div class="page-icon" id="pi-deals">
            <div class="menu-icon" id="mi-deals"><ion-icon name="gift"></ion-icon></div>
        </div>
    </a>
    <a href="#" class="menu-link" id="ml-clients">
        <div class="page-menu" id="pm-clients">
            <div class="menu-title" id="mt-clients">CLIENT'S ACCOUNTS</div>
        </div>
        <div class="page-icon" id="pi-clients">
            <div class="menu-icon" id="mi-clients"><ion-icon name="person"></ion-icon></div>
        </div>
    </a>
    <a href="#" class="menu-link" id="ml-transactions">
        <div class="page-menu" id="pm-transactions">
            <div class="menu-title" id="mt-transactions">TRANSACTIONS</div>
        </div>
        <div class="page-icon" id="pi-transactions">
            <div class="menu-icon" id="mi-transactions"><ion-icon name="receipt"></ion-icon></ion-icon></div>
        </div>
    </a>
</div>
<div class="page-content">
    <h1>Something must be shown here.</h1>
</div>
@endsection