<x-guest-layout>
    <div class="guestSlot">
        <h1 id="registerTitle">Create An Account</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="registerInputName" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="Name" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4" id="registerEmail">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="registerInputEmail" class="block mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Email" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4" id="registerPassword">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="registerInputPassword" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                placeholder="Password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4" id="registerConfirm">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="registerInputPassword_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="guestRegister">
                <x-primary-button class="ms-4" id="mainButton">
                    {{ __('SIGN UP') }}
                </x-primary-button>
            </div>
        </form>
    </div>
    <div class="guestHelp">
        <p>Alredy Have an Account? <a href="{{ route('login') }}">Sign In</a></p>
    </div>
</x-guest-layout>
