@extends('layouts.dashboardLayout')

@section('head-access')
    <link rel="stylesheet" href="{{ asset('css/modulesCSS/membersStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modulesCSS/universalCRUD.css') }}">
@endsection

@section('content')
    <div class="universal-div">
        <div class="universal-div-main">
            <h3 class="universal-div-header">Edit Member</h3>
            <div>
                @if(session()->has('success'))
                    <div>
                        {{session('success')}}
                    </div>
                @endif
            </div>
            <div class="universal-div-content">
                <form method="post" action="{{route('memberList.update', ['member' => $member])}}">
                    @csrf
                    @method('put')
                    <div class="label">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="Name" value="{{ $member->user_name }}" required autofocus>
                    </div>
                    <div class="label">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Email" value="{{ $member->user_email }}">
                    </div>
                    <div class="label">
                        <label for="contact_number">Contact Number</label>
                        <input type="text" name="contact_number" id="contact_number" placeholder="Phone" value="{{ $member->contact_number }}" required>
                    </div>
                    <div class="label">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" placeholder="Address" value="{{ $member->address }}" required>
                    </div>
                    <div class="label">
                        <label for="duration">Duration:</label>
                        <select name="duration_option" id="duration_option" required>
                            @foreach($rates as $rate)
                                <option value="{{ $rate->id }}" {{ ($rate->name == $member->availed_membership ) ? 'selected' : ''}}>
                                    {{ $rate->duration_value }} {{ $rate->duration_unit }} (s) for ${{ $rate->price }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="submit-button">
                        <input type="submit" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection