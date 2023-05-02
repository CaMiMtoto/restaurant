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
    <div class="pb-10 bg-center bg-cover lg:min-h-[75vh]" id="header"
        style="background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url({{ asset('img/home/chefs-bg.jpg') }})">
        <x-partials._top_nav />
        <div class="flex flex-col items-center content-center max-w-xl mx-auto text-center text-white lg:mt-20">
            <h4 class="my-10 text-5xl font-semibold">
                Hari <span class="font-semibold text-primary italic">Ubuzima</span>
            </h4>
            <p class="text-base leading-7 text-gray-300">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur blanditiis distinctio dolor eaque,
                nam
                quasi recusandae sequi sit temporibus. Asperiores eius exercitationem nulla sed voluptate. Eaque
                inventore
                quod repellendus sequi?
            </p>
            <a href="" class="px-8 py-4 mt-10 text-white border border-primary hover:text-primary">
                Make a reservation
            </a>
        </div>
    </div>

    <div class="container px-10 py-3 mx-auto max-w-7xl">
        {{--menu options--}}
        <div class="max-w-xl mx-auto my-10 text-center" id="menu">
            <h4 class="text-3xl">
                Menu options
            </h4>
            <p class="mt-5 text-gray-500">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione numquam eos perferendis itaque hic
                unde,
                ad, laudantium minima.
            </p>
        </div>

        <div x-data="{ tab: 'first' }">
            <div class="flex justify-center">
                <button class="px-4 py-2 text-sm font-bold text-gray-500 uppercase border-b-4 hover:text-gray-700"
                    :class="{ 'border-primary text-gray-900': tab === 'first' }" @click="tab = 'first'">
                    Main
                </button>
                <button class="px-4 py-2 text-sm font-bold text-gray-500 uppercase border-b-4 hover:text-gray-700"
                    :class="{ 'border-primary text-gray-900': tab === 'second' }" @click="tab = 'second'">
                    Dinner
                </button>
                <button class="px-4 py-2 text-sm font-bold text-gray-500 uppercase border-b-4 hover:text-gray-700"
                    :class="{ 'border-primary text-gray-900': tab === 'third' }" @click="tab = 'third'">
                    Lunch
                </button>
            </div>

            <div class="py-4">
                <div x-show="tab === 'first'">
                    {{-- grid of two columns--}}
                    <div class="grid gap-3 md:grid-cols-2">
                        @for($i=0; $i<6; $i++) <a href="#"
                            class="flex flex-col items-center bg-white border-b border-gray-200 rounded-none md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <img class="object-contain w-full h-32 rounded-t-lg md:w-48 md:rounded-none"
                                src="{{ asset('img/specials/specials-'.rand(1,5).'.jpg') }}" alt="">
                            <div class="flex flex-col justify-between p-2 leading-normal">
                                <div class="flex items-center justify-between mb-2">
                                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                        Specials {{ $i+1 }}
                                    </h5>

                                    <span class="text-gray-700 dark:text-gray-400">$ {{ rand(10, 100) }}</span>

                                </div>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    Specials are our way of showcasing our greatest dishes at a discounted price. We
                                    change our specials every month so check back often to see what we have in store for
                                    you!
                                </p>
                            </div>
                            </a>
                            @endfor
                    </div>
                </div>

                <div x-show="tab === 'second'">
                    <div class="grid gap-3 md:grid-cols-2">
                        @for($i=0; $i<6; $i++) <a href="#"
                            class="flex flex-col items-center bg-white border-b border-gray-200 rounded-none md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <img class="object-contain w-full h-32 rounded-t-lg md:w-48 md:rounded-none"
                                src="{{ asset('img/specials/specials-'.rand(1,5).'.jpg') }}" alt="">
                            <div class="flex flex-col justify-between p-2 leading-normal">
                                <div class="flex items-center justify-between mb-2">
                                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                        Specials {{ $i+1 }}
                                    </h5>

                                    <span class="text-gray-700 dark:text-gray-400">$ {{ rand(10, 100) }}</span>

                                </div>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    Specials are our way of showcasing our greatest dishes at a discounted price. We
                                    change our specials every month so check back often to see what we have in store for
                                    you!
                                </p>
                            </div>
                            </a>
                            @endfor
                    </div>
                </div>

                <div x-show="tab === 'third'">
                    <div class="grid gap-3 md:grid-cols-2">
                        @for($i=0; $i<6; $i++) <a href="#"
                            class="flex flex-col items-center bg-white border-b border-gray-200 rounded-none md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <img class="object-contain w-full h-32 rounded-t-lg md:w-48 md:rounded-none"
                                src="{{ asset('img/specials/specials-'.rand(1,5).'.jpg') }}" alt="">
                            <div class="flex flex-col justify-between p-2 leading-normal">
                                <div class="flex items-center justify-between mb-2">
                                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                        Specials {{ $i+1 }}
                                    </h5>

                                    <span class="text-gray-700 dark:text-gray-400">$ {{ rand(10, 100) }}</span>

                                </div>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    Specials are our way of showcasing our greatest dishes at a discounted price. We
                                    change our specials every month so check back often to see what we have in store for
                                    you!
                                </p>
                            </div>
                            </a>
                            @endfor
                    </div>
                </div>
            </div>
        </div>

        {{-- featured dishes--}}

        <div class="max-w-xl mx-auto my-10 text-center">
            <h4 class="text-3xl italic">
                Our Featured <span class="font-semibold text-primary">Dishes</span>
            </h4>
            <p class="mt-5 text-gray-500">
                Dishes that are loved by our customers and are always on our menu.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 place-items-center">
            @for($i=0; $i<4; $i++) <div class="max-w-sm bg-white dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-none" src="{{ asset('img/dishes/'.rand(28,31).'.jpg') }}" alt="" />
                </a>
                <div class="py-5">
                    <div class="flex items-center justify-between mb-2">
                        <a href="" class="text-lg font-medium tracking-tight text-gray-900 dark:text-white">Noteworthy
                            technology acquisitions 2021</a>
                        <span class="flex-shrink-0 font-semibold text-primary ">$ {{ rand(10, 100) }}</span>
                    </div>
                    <p class="mb-3 font-normal text-gray-500">
                        Specials are our way of showcasing our greatest dishes at a discounted price.
                    </p>
                    <a href="#"
                        class="inline-flex items-center px-3 py-1 text-sm font-medium text-center text-gray-800 border rounded-none border-primary hover:text-primary focus:ring-2 focus:outline-none focus:ring-primary focus:ring-offset-2">
                        Order Now
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                        </svg>

                    </a>
                </div>
        </div>

        @endfor
    </div>
    </div>
    {{-- bookl a table--}}
    <div class="py-10 bg-gray-100" id="reservation">
        <div class="container max-w-4xl px-10 py-3 mx-auto">
            <div class="max-w-xl mx-auto my-10 text-center">
                <h4 class="text-3xl italic">
                    Make a <span class="font-semibold text-primary">Reservation</span>
                </h4>
                <p class="mt-5 text-gray-800">
                    Reserve a table for your next visit to our restaurant. We will be happy to serve you.
                </p>
            </div>
            <form class="flex flex-col justify-center">
                <div class="grid gap-4 md:grid-cols-2">
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 sr-only">
                            Full Name
                        </label>
                        <input type="text" id="name" name="name" placeholder="Full name"
                            class="bg-white border border-gray-100  text-gray-900 text-sm rounded-none focus:ring-primary focus:border-primary focus:ring-offset-2 block w-full px-2.5 py-3"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="people" class="block mb-2 text-sm font-medium text-gray-900 sr-only">
                            Number of People
                        </label>
                        <select type="text" id="people" name="people" se
                            class="bg-white border border-gray-100  text-gray-900 text-sm rounded-none focus:ring-primary focus:border-primary focus:ring-offset-2 block w-full px-2.5 py-3"
                            required>
                            <option value="">Number of People</option>
                            @foreach(range(1, 10) as $i)
                            <option value="{{ $i }}">
                                {{ $i }}
                                {{ Str::plural('person', $i) }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 sr-only">
                            Phone Number
                        </label>
                        <input type="tel" id="name" name="phone" placeholder="Phone  number"
                            class="bg-white border border-gray-100  text-gray-900 text-sm rounded-none focus:ring-primary focus:border-primary focus:ring-offset-2 block w-full px-2.5 py-3"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 sr-only">
                            Email address
                        </label>
                        <input type="email" id="email" name="email" placeholder="Email address"
                            class="bg-white border border-gray-100  text-gray-900 text-sm rounded-none focus:ring-primary focus:border-primary focus:ring-offset-2 block w-full px-2.5 py-3">
                    </div>
                    <div class="mb-6">
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 sr-only">
                            Date
                        </label>
                        <input type="date" id="date" name="date" placeholder="Date"
                            value="{{ today()->format('Y-m-d') }}"
                            class="bg-white border border-gray-100  text-gray-900 text-sm rounded-none focus:ring-primary focus:border-primary focus:ring-offset-2 block w-full px-2.5 py-3">
                    </div>

                    <div class="mb-6">
                        <label for="time" class="block mb-2 text-sm font-medium text-gray-900 sr-only">
                            Time
                        </label>
                        <input type="time" id="time" name="time" placeholder="Time"
                            value="{{ now()->addHour()->format('H:i') }}"
                            class="bg-white border border-gray-100  text-gray-900 text-sm rounded-none focus:ring-primary focus:border-primary focus:ring-offset-2 block w-full px-2.5 py-3">
                    </div>

                </div>
                <button type="submit"
                    class="self-center px-6 py-3 text-sm font-semibold text-white uppercase border border-primary bg-primary hover:text-gray-50 focus:ring focus:ring-offset-2 focus:ring-primary">
                    Reserve a Table
                </button>
            </form>
        </div>
    </div>

    <div id="contact">
        <div class="grid md:grid-cols-2">
            <div>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d996.8680267338515!2d30.062750487545653!3d-1.9650160900451972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2srw!4v1682278624060!5m2!1sen!2srw"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="container max-w-4xl px-10 py-3 mx-auto">
                <div class="max-w-xl mx-auto my-10 text-center">
                    <h4 class="text-3xl italic">
                        Getin touch <span class="font-semibold text-primary">with Us</span>
                    </h4>
                    <p class="mt-5 text-gray-800">
                        Tell us how we can help, and we’ll get back to you shortly.
                    </p>
                </div>
                <form class="">
                    <div class="grid gap-4 md:grid-cols-2">
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 sr-only">
                                Full Name
                            </label>
                            <input type="text" id="name" name="name" placeholder="Full name"
                                class="bg-white border border-gray-100  text-gray-900 text-sm rounded-none focus:ring-primary focus:border-primary focus:ring-offset-2 block w-full px-2.5 py-3"
                                required>
                        </div>

                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 sr-only">
                                Email address
                            </label>
                            <input type="email" id="email" name="email" placeholder="Email address"
                                class="bg-white border border-gray-100  text-gray-900 text-sm rounded-none focus:ring-primary focus:border-primary focus:ring-offset-2 block w-full px-2.5 py-3">
                        </div>

                        <div class="mb-6 col-span-2">
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 sr-only">
                                Message
                            </label>
                            <textarea id="message" name="message" placeholder="Message" rows="5"
                                class="bg-white border border-gray-100  text-gray-900 text-sm rounded-none focus:ring-primary focus:border-primary focus:ring-offset-2 block w-full px-2.5 py-3"></textarea>
                        </div>
                    </div>
                    <button type="submit"
                        class="self-center px-6 py-3 text-sm font-semibold text-white uppercase border border-primary bg-primary hover:text-gray-50 focus:ring focus:ring-offset-2 focus:ring-primary">
                        Send a Message
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{--footer--}}
    <footer class="bg-gray-900 bg-center bg-no-repeat bg-cover"
        style="background-image: linear-gradient(rgba(0,0,0,0.9), rgba(0,0,0,0.9)), url({{ asset('img/specials/specials-3.jpg') }})">
        <div class="container px-10 py-3 mx-auto max-w-7xl">
            <div class="grid gap-4 text-gray-400 md:grid-cols-2 lg:grid-cols-4">
                <div class="col-span-2">
                    <h4 class="my-3 text-sm font-semibold uppercase text-primary" id="about">
                        About Us
                    </h4>
                    <p class="text-base">
                        Hari Ubuzima is a restaurant located in Kigali, Rwanda. We serve a variety of dishes and drinks.
                        We make sure that our customers are satisfied with our services. since 2023 we have been serving
                        our
                        customers with the best services.
                    </p>
                    <div class="my-4">
                        <h4 class="mb-3 text-white">
                            Newsletter
                        </h4>
                        <form action="" class="flex flex-col gap-2 sm:flex-row">
                            <label for="subscribe-email" class="sr-only">Email</label>
                            <input type="email" placeholder="Email address" id="subscribe-email"
                                class="bg-white border border-gray-100  text-gray-900 text-sm rounded-none focus:ring-primary focus:border-primary focus:ring-offset-2 block w-full px-2.5 py-3">
                            <button type="submit"
                                class="self-center px-6 py-3 text-sm font-semibold text-white uppercase border border-primary bg-primary hover:text-gray-50 focus:ring focus:ring-offset-2 focus:ring-primary">
                                Subscribe
                            </button>
                        </form>

                    </div>
                </div>
                <div>
                    <h4 class="my-3 text-sm font-semibold uppercase text-primary">
                        Contact Info
                    </h4>
                    <div class="flex flex-col gap-4 text-sm">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            <span>
                                KN 4 Avenue, Kigali, Rwanda
                            </span>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>

                            <a href="tel:+250 788 888 888">
                                +250 788 888 888
                            </a>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>


                            <a href="mailto:mail@domain.com">
                                mail@domain.com
                            </a>
                        </div>
                        <h4 class="text-white">
                            Follow Us
                        </h4>
                        <div class="flex items-center gap-2">
                            <a href="" class="text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-brand-facebook" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3">
                                    </path>
                                </svg>
                            </a>
                            <a href="" class="text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-brand-instagram" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z">
                                    </path>
                                    <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                    <path d="M16.5 7.5l0 .01"></path>
                                </svg>
                            </a>
                            <a href="" class="text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-brand-twitter" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c0 -.249 1.51 -2.772 1.818 -4.013z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div>
                    <h4 class="my-3 text-sm font-semibold uppercase text-primary">
                        Opening Hours
                    </h4>
                    <div class="text-sm">
                        <div class="mb-4">
                            <div class="mb-2 uppercase">
                                Monday - Friday
                            </div>
                            <div class="italic text-gray-400">
                                9:00 AM - 01:00 AM
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="mb-2 uppercase">
                                Saturday - Sunday
                            </div>
                            <div class="italic text-gray-400">
                                10:00 AM - 11:00 PM
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    {{-- create a link to scroll back to the top of the page --}}
    <a href="#top" id="scroller" class="fixed p-2 rounded-full bottom-4 right-4 bg-primary">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-up" width="24" height="24"
            viewBox="0 0 24 24" stroke-width="1.5" stroke="white" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <line x1="18" y1="11" x2="12" y2="5"></line>
            <line x1="6" y1="11" x2="12" y2="5"></line>
        </svg>
    </a>


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
