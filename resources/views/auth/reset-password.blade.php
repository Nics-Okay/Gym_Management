<x-guest-layout>
    @include('partials/loginLogoutHeader')
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="reset-password-email">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required readonly autofocus autocomplete="username"/>
        </div>

        <!-- Password -->
        <div class="reset-password-password">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"/>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="reset-password-confirm">
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"/>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="guestReset">
            <button type="submit" id="mainButton" class="primary-button">Reset Password</button>
        </div>
    </form>
</x-guest-layout>
