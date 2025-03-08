<x-guest-layout>
    @include('partials/loginLogoutHeader')
    <div class="guestSlot">

        <h1 id="registerTitle">Create An Account</h1>

        @if ($errors->has('error'))
            <div class="error">{{ $errors->first('error') }}</div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <!-- Name -->
            <div class="register-name">
                <label for="name">Name</label>
                <input id="register-input-name" type="text" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus autocomplete="name"/>
            </div>

            <!-- Email Address -->
            <div class="register-email">
                <label for="email">Email</label>
                <input id="register-input-email" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus autocomplete="username"/>
            </div>

            <!-- Password -->
            <div class="register-password">
                <label for="password">Password</label>
                <input id="register-input-password" type="password" name="password" placeholder="Password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="register-password-confirm">
                <label for="password-confirmation">Confirm Password</label>
                <input id="register-input-password-confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" />
            </div>

            <div class="guestRegister">
                <button type="submit" id="mainButton" class="primary-button">SIGN UP</button>
            </div>
        </form>
    </div>
    <div class="guestHelp">
        <p>Alredy Have an Account? <a href="{{ route('login') }}">Sign In</a></p>
    </div>
</x-guest-layout>
