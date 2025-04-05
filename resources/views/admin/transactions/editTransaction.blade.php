@extends('layouts.dashboardLayout')

@section('head-access')
    <link rel="stylesheet" href="{{ asset('css/modulesCSS/universalCRUD.css') }}">
@endsection

@section('content')
    <div class="universal-div">
        <div class="universal-div-main">
            <h3 class="universal-div-header">Edit Transaction Details</h3>
            <div>
                @if(session()->has('success'))
                    <div>
                        {{session('success')}}
                    </div>
                @endif
            </div>
            <div class="universal-div-content">
                <form method="post" action="{{route('transactions.update', ['transaction' => $transaction])}}">
                    @csrf
                    @method('put')
                    <div class="label">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="Name" value="{{ $transaction->user_name }}" required autofocus>
                    </div>
                    <div class="label">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email" value="{{ $transaction->user_email }}" required>
                    </div>
                    <div class="label">
                        <label for="contact_number">Contact Number</label>
                        <input type="text" name="contact_number" id="contact_number" placeholder="Phone" value="{{ $transaction->member->contact_number }}" required>
                    </div>
                    <div class="submit-button">
                        <input type="submit" value="Confirm">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection