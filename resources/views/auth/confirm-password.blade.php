<x-guest-layout>
    @include('partials/loginLogoutHeader')
    <div class="confirm-password">
        This is a secure area of the application. Please confirm your password before continuing.
    </div>

    @if ($errors->has('error'))
        <div class="error">{{ $errors->first('error') }}</div>
    @endif
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="confirm-password-password">
            <label for="password">Password</label>   
            <input id="password" type="password" name="password" required autocomplete="current-password" />
        </div>

        <div class="guestConfirm">
            <button type="submit" id="mainButton" class="primary-button">Confirm</button>
        </div>
    </form>
</x-guest-layout>
