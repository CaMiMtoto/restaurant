<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

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
                <div class="w-10 h-10 rounded-full bg-gray-400"></div>
                <div class="ml-4">
                    <div class="font-medium text-base text-gray-800">John Doe</div>
                    <div class="mt-1">
                        <a href="#" class="text-gray-600 hover:text-gray-900">Log out</a>
                    </div>
                </div>
            </div>
            <ul class="mt-8">
                <li><a href="#" class="text-gray-700 hover:text-gray-900">Dashboard</a></li>
                <li><a href="#" class="text-gray-700 hover:text-gray-900">Users</a></li>
                <li><a href="#" class="text-gray-700 hover:text-gray-900">Settings</a></li>
            </ul>
        </div>
        <div class="flex-1 p-4">
            <button id="sidebar-toggle" class="text-gray-600 hover:text-gray-900 focus:outline-none focus:text-gray-900"
                aria-label="Toggle sidebar">
                <i class="fas fa-bars fa-2x text-primary"></i>
            </button>
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
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

        function toogleSideBarClass(){
            if (window.innerWidth > 1024) {
                sidebar.classList.remove('hidden');
                sidebar.classList.add('block');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
            else{
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