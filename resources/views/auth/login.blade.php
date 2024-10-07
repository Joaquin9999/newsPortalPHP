<x-guest-layout>
    <div class="text-center mb-8">
        <!-- Añadido un div para centrar el título -->
        <a href="{{ route('home') }}" class="m-0 text-[#214252] dark:text-white"
            style="font-size: 3rem; font-weight: 700;">
            CiberTrends<span class="text-primary;">.</span>
        </a>
    </div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-[#214252] shadow-sm focus:ring-[#214252] dark:focus:ring-[#214252] dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>

        </div>

        <div class="flex items-center justify-center mt-4">
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
        <div class="flex items-center justify-center mt-4">
            <a
                class="text-sm text-gray-600 dark:text-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 mr-2">
                {{ __('Forgot your password?') }}
            </a>
            @if (Route::has('password.request'))
            <a class="underline text-sm hover:text-blue-900 dark:hover:text-blue-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 dark:focus:ring-offset-gray-800"
                style="color: #0017f1; focus:ring-color: #0017f1;" href="{{ route('password.request') }}">
                {{ __(' Reset here') }}
            </a>

            @endif
        </div>
        <div class="flex items-center justify-center mt-4">
            <a
                class="text-sm text-gray-600 dark:text-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 mr-2">
                {{ __('Dont have an account? ') }}
            </a>
            <a class="underline text-sm rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 dark:focus:ring-offset-gray-800"
                style="color: #0017f1; hover-color: #0017f1; focus:ring-color: #0017f1;" href="{{ route('register') }}">
                {{ __(' Click here') }}
            </a>

        </div>
    </form>
</x-guest-layout>