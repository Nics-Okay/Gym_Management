@extends('layouts.dashboardLayout')

@section('content')
<div class="admin-profile">
    <div class="admin-profile-main">
        <div class="admin-profile-profile">
            <h2 class="admin-profile-h2">Profile Information</h2>
            <p class="admin-profile-p">Update your account's profile information and email address.</p>
            @include('profile.partials.update-profile-information-form')
        </div>
        <div class="admin-profile-password">
            <h2 class="admin-profile-h2">Update Password</h2>
            <p class="admin-profile-p">Ensure your account is using a long, random password to stay secure.</p>
            @include('profile.partials.update-password-form')
        </div>
    </div>
</div>
@endsection