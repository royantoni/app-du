<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <h1 class="text-center text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
        Iniciar sesión
    </h1>
    <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('login') }}">
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

        <div class="flex items-center justify-between">
            <div class="flex items-start">
                <div class="flex items-center h-5">

                    <input id="remember_me" type="checkbox"
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                        name="remember">
                </div>
                <div class="ml-3 text-sm">
                    <label for="remember_me" class="text-gray-500 dark:text-gray-300">{{ __('Recordarme') }}</label>
                </div>
            </div>

            @if (Route::has('password.request'))
                <a class="text-sm font-medium text-primary-600 hover:underline dark:text-blue-500"
                    href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif
        </div>

        <x-primary-button>
            {{ __('Log in') }}
        </x-primary-button>


    </form>
</x-guest-layout>
