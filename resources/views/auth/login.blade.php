<x-guest-layout>
    @include('partials/loginLogoutHeader')
    <div class="guestSlot">
                
        <!-- Session Status -->
        @if (session('status'))
            <div id="session-status" class="session-status">
                {{ session('status') }}
            </div>
        @endif

        <h1 id="loginTitle">Login Your Account</h1>

        @if ($errors->has('error'))
            <div class="error">{{ $errors->first('error') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="login-email">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus autocomplete="username"/>
            </div>

            <!-- Password -->
            <div class="login-pass">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" placeholder="Password" required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="login-remember">
                <label for="remember_me">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span>Remember me</span>
                </label>
            </div>

            <div class="guestLogin">
                <button type="submit" id="mainButton" class="primary-button">SIGN IN</button>
            </div>
        </form> 
    </div>

    <!-- Help Section -->
    <div class="guestHelp">
        <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
        <a href="{{ route('password.request') }}" id="guestHelpRef">Forgot your password?</a>
    </div> 
</x-guest-layout>
