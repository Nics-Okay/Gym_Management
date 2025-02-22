@extends('layouts.customerLayout')

@section('title-main', 'Settings') <!-- Define the title section first -->

@section('customerContent') <!-- Define the main content section -->
    @include('partials.customerTitle') <!-- Include the title partial -->
    <div class="settings-menu-1">
        <div class="customer-settings">
            <ul>
                <li><a href="#">
                    <ion-icon name="person"></ion-icon>
                    Profile Settings</a>
                </li>
                <li><a href="#">
                    <ion-icon name="newspaper"></ion-icon>
                    Subscription</a>
                </li>
                <li><a href="#">
                    <ion-icon name="time"></ion-icon>
                    Pending Transactions</a>
                </li>
                <li><a href="#">
                    <ion-icon name="footsteps"></ion-icon>
                    Membership Status</a>
                </li> 
            </ul>
        </div>
    </div>
    <div class="settings-menu-2">
        <h2>Tools</h2>
        <div class="customer-tools">
            <ul>
                <li><a href="#">
                    <ion-icon name="calculator"></ion-icon>
                    BMI Calculator</a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{route('logout')}}" onclick="event.preventDefault();
                                this.closest('form').submit();">
                                <ion-icon name="log-out-outline" id="icon-logout"></ion-icon>
                                Log-out
                        </a>
                    </form>
                </li> 
            </ul>
        </div>
    </div>
@endsection