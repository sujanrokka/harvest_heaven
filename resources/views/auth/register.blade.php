<x-guest-layout>
    <style>
        .radio-group .radio:first-child {
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
        }

        .radio-group .radio:last-child {
            border-top-right-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
        }

        .radio-group .radio {
            position: relative;
        }

        .radio input {
            visibility: hidden;
            position: absolute;

        }

        .radio label:hover {
            cursor: pointer;
        }

        .radio input:checked+label {
            border-color: #38C172;
            background-color: #E3FCEC;
        }
    </style>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="radio-group flex first-line: rounded-lg shadow-md w-full space-x-3 mt-3">
            <div class="radio w-full">
                <input type="radio" id="farmer" name="user_role" value="0" checked>
                <label for="farmer" class="block text-center px-4 py-3 bg-white  border-grey border-solid border-2">
                    <div class="text-3xl mb-2">⏱</div>
                    <div class="font-semibold uppercase tracking-wide"><strong>Farmer</strong></div>
                </label>
            </div>
            <div class="radio w-full">
                <input type="radio" id="buyer" name="user_role" value="1">
                <label for="buyer" class="block text-center px-4 py-3 bg-white  border-grey border-solid border-2">
                    <div class="text-3xl mb-2">🚘</div>
                    <div class="font-semibold uppercase tracking-wide"><strong>Buyer</strong></div>
                </label>
            </div>
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
