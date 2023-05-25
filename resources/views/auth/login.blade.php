<x-guest-layout>
    <x-auth-card>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4 bg-white" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <!-- Email Address -->
                <div>
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Пароль')" />

                    <x-input id="password" class="block mt-1 w-full form-control"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input
                            id="remember_me"
                            type="checkbox"
                            class="form-check-label rounded border-gray-300 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50"
                            name="remember"
                        >
                        <span class="ml-2 text-sm text-gray-600">{{ __('Запомнить меня') }}</span>
                    </label>
                </div>

                <div class="d-flex flex-col items-center justify-content-center mt-4">
                    <x-button class="btn btn-sm  btn-danger">
                        {{ __('Войти') }}
                    </x-button>
                    {{--@if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Забыли пароль?') }}
                        </a>
                    @endif--}}
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
