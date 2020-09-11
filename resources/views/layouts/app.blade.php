<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-lux-200">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ get_page_title($pagename) }}</title>

    <x-favicons />
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
</head>
<body class="font-sans text-gray-700 antialiased">
<div>
    <div class="flex flex-col">
        <div class="h-screen flex flex-col">
            <div class="md:flex flex-shrink-0">
                <div
                    class="bg-lux-900 md:flex-shrink-0 md:w-56 px-6 py-4 flex items-center justify-between md:justify-center">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="/dashboard">
                            <x-logo-card theme="light"/>
                        </a>
                    </div>
                </div>
                <div
                    class="bg-white border-b w-full p-4 md:py-0 md:px-12 text-sm md:text-md flex justify-between items-center">
                    <div class="mr-4">
                        <h1 class="font-bold text-2xl">{{ $pagename }}</h1>
                    </div>
                    <div class="">
                        <!-- Primary Navigation Menu -->
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="flex justify-between h-16">

                                <!-- Settings Dropdown -->
                                <div class="hidden sm:flex sm:items-center sm:ml-6">
                                    <x-jet-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button
                                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none transition duration-150 ease-in-out items-center">
                                                <img class="h-8 w-8 rounded-full focus:border-gray-300"
                                                     src="{{ Auth::user()->profile_photo_url }}"
                                                     alt="{{Auth::user()->full_name}}"/>
                                                <span class="ml-1">{{Auth::user()->full_name}}</span>
                                                <x-icon-cheveron-down
                                                    class="ml-1 w-5 h-5 group-hover:fill-indigo-600 fill-gray-700 focus:fill-indigo-600"/>
                                            </button>
                                        </x-slot>

                                        <x-slot name="content">
                                            <!-- Account Management -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                Manage Account
                                            </div>

                                            <x-jet-dropdown-link href="/user/profile">
                                                Profile
                                            </x-jet-dropdown-link>

                                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                                <x-jet-dropdown-link href="/user/api-tokens">
                                                    API Tokens
                                                </x-jet-dropdown-link>
                                            @endif

                                            <div class="border-t border-gray-100"></div>

                                        <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                                                     onclick="event.preventDefault();
                                                                     this.closest('form').submit();">
                                                    Logout
                                                </x-jet-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-jet-dropdown>
                                </div>

                                <!-- Hamburger -->
                                <div class="-mr-2 flex items-center sm:hidden">
                                    <button @click="open = ! open"
                                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M4 6h16M4 12h16M4 18h16"/>
                                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-grow overflow-hidden">
                <div class="bg-lux-800 flex-shrink-0 w-56 py-5 hidden md:block overflow-y-auto">
                    <x-nav-menu />
                </div>

                <div class="flex-1 px-4 py-8 md:p-12 overflow-y-auto">
                    <!-- Page Content -->
                    <main>
                        {{ $slot }}
                    </main>
                </div>
            </div>

        </div>
    </div>
</div>

@stack('modals')

@livewireScripts
</body>
</html>
