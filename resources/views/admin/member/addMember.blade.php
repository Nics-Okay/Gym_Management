@extends('layouts.dashboardLayout')

@section('head-access')
    <link rel="stylesheet" href="{{ asset('css/modulesCSS/membersStyle.css') }}">
@endsection

@section('content')
    <div class="temp-member-div">
        <h3>Add New Member</h3>
        <div>
            @if(session()->has('success'))
                <div>
                    {{session('success')}}
                </div>
            @endif
        </div>
        <form method="post" action="{{route('memberList.store')}}">
            @csrf
            @method('post')
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Name" required autofocus>
            </div>
            <div>
                <label for="contact_number">Contact Number</label>
                <input type="text" name="contact_number" id="contact_number" placeholder="Phone" required>
            </div>
            <div>
                <label for="address">Address</label>
                <input type="text" name="address" id="address" required placeholder="Address">
            </div>
            <div>
                <label for="duration">Duration:</label>
                <select name="duration_option" id="duration_option" required>
                    @foreach($rates as $rate)
                        <option value="{{ $rate->id }}">{{ $rate->duration_value }} {{ $rate->duration_unit }} (s) for ${{ $rate->price }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <input type="submit" value="Confirm">
            </div>
        </form>
    </div>
@endsection