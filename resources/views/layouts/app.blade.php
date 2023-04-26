<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    @bukStyles
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

<div class="flex flex-row" x-data="">
    <div id="sidebar" class="w-80 bg-gray-100 min-h-screen p-4 border-r hidden" x-transition>
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-semibold text-gray-900">Admin Panel</h2>

        </div>
        <div class="mt-8 flex items-center">
            <div class="w-10 h-10 rounded-full bg-primary"></div>
            <div class="ml-4">
                <div class="font-medium text-base text-gray-800">John Doe</div>
                <div class="mt-1">
                    <a href="#" class="text-gray-600 hover:text-gray-900">Log out</a>
                </div>
            </div>
        </div>
        <ul class="mt-8 flex flex-col gap-3">
            <li>
                <a href="#" class="text-gray-700 hover:text-gray-900 w-full inline-flex font-normal px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9"/>
                    </svg>
                    <span class="ml-2">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" class="text-gray-700 hover:text-gray-900 w-full inline-flex font-normal px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-box-multiple" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M7 3m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z"></path>
                        <path d="M17 17v2a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2"></path>
                    </svg>
                    <span class="ml-2">Categories</span>
                </a>
            </li>
            <li>
                <a href="#" class="text-gray-700 hover:text-gray-900 w-full inline-flex font-normal px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-notebook" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M6 4h11a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-11a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1m3 0v18"></path>
                        <path d="M13 8l2 0"></path>
                        <path d="M13 12l2 0"></path>
                    </svg>
                    <span class="ml-2">Menu</span>
                </a>
            </li>
            <li>
                <a href="#" class="text-gray-900 font-semibold  w-full inline-flex  px-2 bg-gray-200  py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-booking" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 18v-9.5a4.5 4.5 0 0 1 4.5 -4.5h7a4.5 4.5 0 0 1 4.5 4.5v7a4.5 4.5 0 0 1 -4.5 4.5h-9.5a2 2 0 0 1 -2 -2z"></path>
                        <path d="M8 12h3.5a2 2 0 1 1 0 4h-3.5v-7a1 1 0 0 1 1 -1h1.5a2 2 0 1 1 0 4h-1.5"></path>
                        <path d="M16 16l.01 0"></path>
                    </svg>

                    <span class="ml-2">Reservations</span>
                </a>
            </li>
            <li>
                <a href="#" class="text-gray-900  w-full inline-flex font-normal px-2 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-soup" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 11h16a1 1 0 0 1 1 1v.5c0 1.5 -2.517 5.573 -4 6.5v1a1 1 0 0 1 -1 1h-8a1 1 0 0 1 -1 -1v-1c-1.687 -1.054 -4 -5 -4 -6.5v-.5a1 1 0 0 1 1 -1z"></path>
                        <path d="M12 4a2.4 2.4 0 0 0 -1 2a2.4 2.4 0 0 0 1 2"></path>
                        <path d="M16 4a2.4 2.4 0 0 0 -1 2a2.4 2.4 0 0 0 1 2"></path>
                        <path d="M8 4a2.4 2.4 0 0 0 -1 2a2.4 2.4 0 0 0 1 2"></path>
                    </svg>
                    <span class="ml-2">Orders</span>
                </a>
            </li>
            <li>
                <a href="#" class="text-gray-900  w-full inline-flex font-normal px-2 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-mailbox" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M10 21v-6.5a3.5 3.5 0 0 0 -7 0v6.5h18v-6a4 4 0 0 0 -4 -4h-10.5"></path>
                        <path d="M12 11v-8h4l2 2l-2 2h-4"></path>
                        <path d="M6 15h1"></path>
                    </svg>
                    <span class="ml-2">Messages</span>
                </a>
            </li>
            <li>
                <a href="#" class="text-gray-900  w-full inline-flex font-normal px-2 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-google-photos" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M7.5 7c2.485 0 4.5 1.974 4.5 4.409v.591h-8.397a.61 .61 0 0 1 -.426 -.173a.585 .585 0 0 1 -.177 -.418c0 -2.435 2.015 -4.409 4.5 -4.409z"></path>
                        <path d="M16.5 17c-2.485 0 -4.5 -1.974 -4.5 -4.409v-.591h8.397c.333 0 .603 .265 .603 .591c0 2.435 -2.015 4.409 -4.5 4.409z"></path>
                        <path d="M7 16.5c0 -2.485 1.972 -4.5 4.405 -4.5h.595v8.392a.61 .61 0 0 1 -.173 .431a.584 .584 0 0 1 -.422 .177c-2.433 0 -4.405 -2.015 -4.405 -4.5z"></path>
                        <path d="M17 7.5c0 2.485 -1.972 4.5 -4.405 4.5h-.595v-8.397a.61 .61 0 0 1 .175 -.428a.584 .584 0 0 1 .42 -.175c2.433 0 4.405 2.015 4.405 4.5z"></path>
                    </svg>
                    <span class="ml-2">Gallery</span>
                </a>
            </li>
            <li>
                <a href="#" class="text-gray-900  w-full inline-flex font-normal px-2 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-news" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11"></path>
                        <path d="M8 8l4 0"></path>
                        <path d="M8 12l4 0"></path>
                        <path d="M8 16l4 0"></path>
                    </svg>
                    <span class="ml-2">Newsletters</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="flex-1 p-4">
        <button id="sidebar-toggle"
                class="text-gray-600 hover:text-gray-900 focus:outline-none focus:text-gray-900 bg-gray-100 px-3 py-1"
                aria-label="Toggle sidebar">
            <i class="fas fa-bars text-primary"></i>
        </button>
        {{--            @include('layouts.navigation')--}}

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 ">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif
        {{-- <h2 class="text-lg font-semibold text-gray-900">Dashboard</h2>
        <p class="mt-4">Welcome to the dashboard of the admin panel.</p>--}}
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</div>
@bukScripts
<script>
    const toggleButton = document.getElementById('sidebar-toggle');
    const sidebar = document.querySelector('#sidebar');
    const icon = toggleButton.querySelector('i');
    toggleButton.addEventListener('click', () => {
        // sidebar.classList.toggle('hidden');
        if (sidebar.classList.contains('hidden')) {
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
            sidebar.classList.remove('hidden');
            sidebar.classList.add('block');
        } else {
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-times');
            sidebar.classList.remove('block');
            sidebar.classList.add('hidden');
        }
    });

    function toogleSideBarClass() {
        if (window.innerWidth > 1024) {
            sidebar.classList.remove('hidden');
            sidebar.classList.add('block');
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        } else {
            sidebar.classList.remove('block');
            sidebar.classList.add('hidden');
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-times');
        }
    }

    window.addEventListener('resize', function () {
        toogleSideBarClass();
    });
    toogleSideBarClass();

</script>

</body>

</html>
