<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-logo theme="dark" class="w-16 h-16"/>
        </x-slot>

        <x-jet-validation-errors class="mb-4"/>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="flex justify-content-center mt-1">
                <div>
                    <x-jet-label value="First Name"/>
                    <x-jet-input
                        class="mr-2"
                        type="text"
                        name="first_name"
                        :value="old('first_name')"
                        required
                        autofocus
                        autocomplete="first_name"
                    />
                </div>

                <div>
                    <x-jet-label value="Last Name"/>
                    <x-jet-input
                        class=""
                        type="text"
                        name="last_name"
                        :value="old('last_name')"
                        required
                        autofocus
                        autocomplete="last_name"
                    />
                </div>
            </div>

            <div class="mt-4">
                <x-jet-label value="Email"/>
                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required/>
            </div>

            <div class="mt-4">
                <x-jet-label value="Password"/>
                <x-jet-input
                    class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required
                    autocomplete="new-password"
                />
            </div>

            <div class="mt-4">
                <x-jet-label value="Confirm Password"/>
                <x-jet-input
                    class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation"
                    required
                    autocomplete="new-password"
                />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
