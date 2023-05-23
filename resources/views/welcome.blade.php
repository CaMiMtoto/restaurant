<x-master>
    <div class="pb-10 bg-center bg-cover lg:min-h-[75vh]" id="header"
         style="background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url({{ asset('img/home/chefs-bg.jpg') }})">
        <x-partials._top_nav/>
        <div class="flex flex-col items-center content-center max-w-xl mx-auto text-center text-white lg:mt-20">
            <h4 class="my-10 text-5xl font-semibold">
                Hari <span class="font-semibold text-primary italic">Ubuzima</span>
            </h4>
            <p class="text-base leading-7 text-gray-300">
                Delicious food, delivered to you. We are a restaurant that offers a variety of food and drinks.
                We are located in Kigali, Rwanda. We are open from 8:00 AM to 10:00 PM. We are open from Monday to
                Sunday.
            </p>
            <a href="" class="px-8 py-4 mt-10 text-white border border-primary hover:text-primary uppercase">
                Check our menu
            </a>
        </div>
    </div>

    <div class="container px-10 py-3 mx-auto max-w-7xl">
        <x-alerts/>
        {{--menu options--}}
        <div class="max-w-xl mx-auto my-10 text-center" id="menu">
            <h4 class="text-3xl">
                Menu options
            </h4>
            <p class="mt-5 text-gray-500">
                Our menu is made up of different categories of food and drinks.
                Please select a category to view the items in that category, and add them to your list.
            </p>
        </div>

        @if($categories->count() > 0)
            <div x-data="{ tab: 'tab_{{$categories[0]->name}}' }">
                <div class="flex justify-center flex-wrap">
                    @foreach($categories as $category)
                        <button
                            class="px-4 py-2 text-sm font-bold text-gray-500 uppercase  border-b-4 hover:text-gray-700"
                            :class="{ 'border-primary text-gray-900': tab === 'tab_{{$category->name}}' }"
                            @click="tab = 'tab_{{$category->name}}'">
                            {{ $category->name }}
                        </button>
                    @endforeach
                </div>

                <div class="py-4">
                    @foreach($categories as $category)
                        <div x-show="tab ==='tab_{{$category->name}}'">
                            {{-- grid of two columns--}}
                            <div class="grid gap-3 md:grid-cols-2">
                                @foreach($category->items as $item)
                                    <div
                                        class="flex flex-col items-center bg-white border-b py-2 border-gray-200 rounded-none md:flex-row md:max-w-xl hover:bg-gray-50">
                                        <img class="object-cover h-32 rounded-full w-32  lozad"
                                             data-src="{{ $item->photo_thumbnail_url }}" alt="">
                                        <div class="flex flex-col justify-between p-2 leading-normal w-full">
                                            <div class="flex items-center justify-between mb-2">
                                                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                                    {{ $item->name }}
                                                </h5>

                                                <span class="text-gray-700 dark:text-gray-400">
                                        {{ number_format($item->price) }}
                                    </span>

                                            </div>
                                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                                {{ $item->description }}
                                            </p>
                                            {{-- add to list button--}}
                                            <livewire:add-to-list :item="$item"/>
                                        </div>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        @endif

        {{-- featured dishes--}}

        <div class="max-w-xl mx-auto my-10 text-center">
            <h4 class="text-3xl italic">
                Our Special <span class="font-semibold text-primary">Dishes</span>
            </h4>
            <p class="mt-5 text-gray-500">
                Dishes that are loved by our customers and are always on our menu.
            </p>
        </div>

        <!-- Flickity HTML init -->
        <div class="carousel" data-flickity='{ "groupCells": true,"autoPlay":true,"wrapAround":true }'>
            @foreach($specialItems as $item)
                <div class="max-w-sm bg-white dark:bg-gray-800 dark:border-gray-700 mx-5">
                    <img class="rounded-none lozad h-64 w-full md:w-72 object-cover"
                         src="{{ $item->photo_thumbnail_url }}"
                         alt=""/>
                    <div class="py-5">
                        <div class="flex items-center justify-between mb-2">
                            <a href="" class="text-lg font-medium tracking-tight text-gray-900 dark:text-white">
                                {{ $item->name }}
                            </a>
                            <span class="flex-shrink-0 font-semibold text-primary ">
                            {{ number_format($item->price) }}
                        </span>
                        </div>
                        <p class="mb-3 font-normal text-gray-500">
                            {{ $item->description }}
                        </p>
                        <livewire:add-to-list :item="$item"/>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    {{-- bookl a table--}}
    <div class="pb-10 mt-10 bg-gray-100" id="reservation">
        <div class="container max-w-4xl px-10 py-3 mx-auto">
            <div class="max-w-xl mx-auto my-10 text-center">
                <h4 class="text-3xl italic">
                    Make a <span class="font-semibold text-primary">Reservation</span>
                </h4>
                <p class="mt-5 text-gray-800">
                    Reserve a table for your next visit to our restaurant. We will be happy to serve you.
                </p>
            </div>
            {{--            <livewire:table-reservation />--}}
            <div class="grid place-items-center">
                <h1 class="uppercase tracking-wider text-4xl font-semibold">
                    Comming soon
                </h1>
                <form class="mt-6 flex items-center gap-4">
                    <x-text-input placeholder="Email" disabled class=" rounded-sm" type="email" name="email" required/>
                    <button disabled type="submit"
                        class="px-4 py-2 text-sm font-bold rounded-sm text-white uppercase bg-primary hover:bg-primary-dark">
                        Get notified
                    </button>
                </form>
            </div>
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
                        Get in touch <span class="font-semibold text-primary">with Us</span>
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
                            <input type="text" id="name" name="name" placeholder="Full name" disabled
                                   class="bg-white border border-gray-100  text-gray-900 text-sm rounded-none focus:ring-primary focus:border-primary focus:ring-offset-2 block w-full px-2.5 py-3"
                                   required>
                        </div>

                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 sr-only">
                                Email address
                            </label>
                            <input type="email" id="email" name="email" placeholder="Email address" disabled
                                   class="bg-white border border-gray-100  text-gray-900 text-sm rounded-none focus:ring-primary focus:border-primary focus:ring-offset-2 block w-full px-2.5 py-3">
                        </div>

                        <div class="mb-6 col-span-2">
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 sr-only">
                                Message
                            </label>
                            <textarea id="message" name="message" placeholder="Message" rows="5" disabled
                                      class="bg-white border border-gray-100  text-gray-900 text-sm rounded-none focus:ring-primary focus:border-primary focus:ring-offset-2 block w-full px-2.5 py-3"></textarea>
                        </div>
                    </div>
                    <button type="submit" disabled
                            class="self-center px-6 py-3 text-sm font-semibold text-white uppercase border border-primary bg-primary hover:text-gray-50 focus:ring focus:ring-offset-2 focus:ring-primary">
                        Send a Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-master>
