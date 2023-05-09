<nav {{ $attributes->class(['z-10 w-full']) }} x-cloak x-data="{open:false}">
    <div class="container px-10 py-3 mx-auto max-w-7xl">
        <div class="flex justify-between lg:hidden">
            <a class="text-xl font-bold text-white hover:text-primary" href="#">
                <img src="{{ asset('img/hari-ubuzima-high-resolution-logo-color-on-transparent-background.png') }}"
                     class="h-16" alt=""/>
            </a>
            <button class="text-white" @click="open=!open">
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                </svg>
                <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>

            </button>
        </div>
        <div x-show="open" style="opacity: 0.9;" id="navbarContent" x-transition
             class="flex-col items-center justify-between transition duration-500 ease-in-out lg:flex lg:flex-row ">
            <!-- Left Section -->
            <div class="flex flex-col items-center gap-4 py-4 lg:flex-row">
                <a class="text-sm font-semibold tracking-wide text-white uppercase hover:text-primary"
                   href="{{ url('/')}}">
                    Home
                </a>
                <a class="text-sm font-semibold tracking-wide text-gray-200 uppercase hover:text-primary"
                   href="#menu">
                    Menu
                </a>
                <a class="text-sm font-semibold tracking-wide text-gray-200 uppercase hover:text-primary"
                   href="#reservation">
                    Reservation
                </a>
            </div>

            <!-- Middle Section -->
            <div class="flex flex-col items-center justify-center flex-grow py-4 lg:flex-row">
                <a class="text-xl font-bold text-white hover:text-primary" href="#">
                    <img
                        src="{{ asset('img/hari-ubuzima-high-resolution-logo-color-on-transparent-background.png') }}"
                        class="h-16" alt=""/>
                </a>
            </div>

            <!-- Right Section -->
            <div class="flex flex-col items-center gap-4 py-4 lg:flex-row">
                {{--     <a class="text-sm font-semibold tracking-wide text-gray-200 uppercase hover:text-primary"
                        href="#events">
                         News& Events
                     </a>--}}
                {{--        <a class="text-sm font-semibold tracking-wide text-gray-200 uppercase hover:text-primary"
                           href="#gallery">
                            Gallery
                        </a>--}}
                <a class="text-sm font-semibold tracking-wide text-gray-200 uppercase hover:text-primary"
                   href="#contact">
                    Contact
                </a>
                <a class="text-sm font-semibold tracking-wide text-gray-200 uppercase hover:text-primary"
                   href="#about">
                    About Us
                </a>
                {{--                cart counter--}}
                <livewire:cart-counter/>

            </div>


        </div>
    </div>
</nav>
