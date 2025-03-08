<x-guest-layout>
    @include('partials/loginLogoutHeader')
    <div class="forgot-description">
        Need a reset? Enter your email to get a new password.
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div id="session-status" class="session-status">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="forgot-password-email">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="guestForgot">
            <button type="submit" id="mainButton" class="primary-button">Email Password Reset Link</button>
        </div>
    </form>
</x-guest-layout>
