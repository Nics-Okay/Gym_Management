<x-guest-layout>
    @include('partials/loginLogoutHeader')
    <div class="mb-4 text-sm text-gray-600">
        Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="verify-sent">
            A new verification link has been sent to the email address you provided during registration.
        </div>
    @endif

    <div class="verify-resend">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div class="guestVerify">
                <button type="submit" id="mainButton" class="primary-button">Resend Verification Email</button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="verify-logout">
                Log Out
            </button>
        </form>
    </div>
</x-guest-layout>
