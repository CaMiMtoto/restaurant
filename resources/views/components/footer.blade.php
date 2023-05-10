<footer {{ $attributes->class(['bg-gray-900 bg-center bg-no-repeat bg-cover']) }}
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
                               class="bg-white border border-gray-100  text-gray-900 text-sm rounded-sm focus:ring-primary focus:border-primary focus:ring-offset-2 block w-full px-2.5 py-3">
                        <button type="submit"
                                class="self-center px-6 py-3 text-sm font-semibold text-white uppercase border border-primary bg-primary hover:text-gray-50 focus:ring focus:ring-offset-2 focus:ring-primary rounded-sm">
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
                                  d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                        </svg>
                        <span>
                                KN 4 Avenue, Kigali, Rwanda
                            </span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z"/>
                        </svg>

                        <a href="tel:+250 788 888 888">
                            +250 788 888 888
                        </a>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
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

