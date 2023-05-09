<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} @yield('title')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @yield('styles')
</head>

<body class="antialiased" id="top">
{{ $slot }}

{{--footer--}}
<x-footer/>
@livewireScripts

<script>
    function toogleNavClass() {
        if (window.innerWidth > 1024) {
            document.getElementById('navbarContent').style.display = 'flex';
        } else {
            document.getElementById('navbarContent').style.display = 'none';
        }
    }

    // listen when screen size is changed
    window.addEventListener('resize', function () {
        toogleNavClass();
    });

    // listen when page is loaded
    window.addEventListener('load', function () {
        toogleNavClass();
    });

    // Get all the links with a href that starts with '#'
    const links = document.querySelectorAll('a[href^="#"]');

    // Add an event listener to each link
    links.forEach(link => {
        link.addEventListener('click', (event) => {
            // Prevent the default link behavior
            event.preventDefault();

            // Get the target section ID from the link's href
            const targetId = link.getAttribute('href');

            // Scroll smoothly to the target section
            document.querySelector(targetId).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // select #scroller visible when scrolling down
    const scroller = document.getElementById('scroller');

    // listen when page is scrolled
    window.addEventListener('scroll', function () {

        // if page is scrolled down more than 100px
        if (window.scrollY > 100) {
            // show #scroller
            scroller.style.display = 'block';
        } else {
            // hide #scroller
            scroller.style.display = 'none';
        }
    });


</script>
@yield('scripts')
</body>

</html>
