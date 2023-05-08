<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome-free-6.4.0-web/css/all.min.css') }}">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class=" antialiased bg-[#F3F2F7] font-barlow">

<div class="flex flex-row">
    <x-layouts.sidebar/>
    <div class="flex-1 px-6 py-3 flex flex-col min-h-screen">
        <div class="flex-1">
            <div class="flex items-center gap-3">
                <button id="sidebar-toggle"
                        class="text-gray-600 hover:text-gray-900 focus:outline-none focus:text-gray-900 py-3 h-10 w-10 flex items-center justify-center  rounded-sm focus:ring-2 ring-primary ring-offset-2"
                        aria-label="Toggle sidebar">
                <span class="menu-toggler">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-8 h-8">
                  <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                </svg>
            </span>
                </button>

                <!-- Page Heading -->

                <header class="flex items-center w-full flex-1 gap-3 justify-between">
                    <div class="relative">
                        <label>
                            <input type="text" placeholder="Search"
                                   class="block w-64 py-2.5 pl-8 pr-2 rounded-md  text-sm bg-white border border-gray-200 leading-tight focus:outline-none sm:focus:w-96 transition-all duration-500 ease-in-out focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:border-gray-200">
                        </label>
                        <div class="absolute top-0 left-0 mt-2.5 ml-2 text-primary">
                            <svg class="w-4 h-4 fill-current " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M19.707 18.293l-5.372-5.372A7.975 7.975 0 0 0 16 8c0-4.411-3.589-8-8-8S0 3.589 0 8s3.589 8 8 8c1.608 0 3.1-.482 4.354-1.307l5.372 5.372a1 1 0 1 0 1.414-1.414zM2 8c0-3.309 2.691-6 6-6s6 2.691 6 6-2.691 6-6 6-6-2.691-6-6z"/>
                            </svg>
                        </div>
                    </div>


                    <div class="flex gap-4">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-sm text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>

                </header>
            </div>
            <main>
                @if (isset($header))
                    <header class="w-full flex-1">
                        <div class="py-3">
                            {{ $header }}
                        </div>
                    </header>
                @endif
                {{ $slot }}
            </main>
        </div>
        <footer class="flex items-center justify-center py-3">
            <div class="flex items-center justify-center gap-3">
                <div class="text-sm text-gray-500">© 2021 All Rights Reserved.</div>
                <div class="text-sm text-gray-500">Created by <a
                        href="https://www.linkedin.com/in/abdul-muiz-ahmed-0b1b3b1b0/"
                        class="text-primary hover:text-primary-dark font-semibold">
                        Jean Paul Byiringiro
                    </a>
                </div>
            </div>
        </footer>

    </div>
</div>
@livewireScripts
<script>
    const toggleButton = document.getElementById('sidebar-toggle');
    const sidebar = document.querySelector('#sidebar');
    const icon = toggleButton.querySelector('#menu-toggler');
    toggleButton.addEventListener('click', () => {
        // sidebar.classList.toggle('hidden');
        if (sidebar.classList.contains('hidden')) {
            // icon.classList.remove('fa-times');
            // icon.classList.add('fa-bars');
            sidebar.classList.remove('hidden');
            sidebar.classList.add('block');
        } else {
            // icon.classList.remove('fa-bars');
            // icon.classList.add('fa-times');
            sidebar.classList.remove('block');
            sidebar.classList.add('hidden');
        }
    });

    function toogleSideBarClass() {
        if (window.innerWidth > 1024) {
            sidebar.classList.remove('hidden');
            sidebar.classList.add('block');
            // icon.classList.remove('fa-times');
            // icon.classList.add('fa-bars');
        } else {
            sidebar.classList.remove('block');
            sidebar.classList.add('hidden');
            // icon.classList.remove('fa-bars');
            // icon.classList.add('fa-times');
        }
    }

    window.addEventListener('resize', function () {
        toogleSideBarClass();
    });
    toogleSideBarClass();

</script>
@stack('scripts')
</body>

</html>
