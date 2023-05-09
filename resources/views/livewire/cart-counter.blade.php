<x-dropdown align="right" content-classes="bg-gray-900 w-72 right-0 absolute">
    <x-slot name="trigger">
        <button type="button"
                class="relative text-sm font-semibold tracking-wide  uppercase hover:text-white border-0 bg-primary rounded-full p-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-soup" width="24" height="24"
                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                 stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path
                    d="M4 11h16a1 1 0 0 1 1 1v.5c0 1.5 -2.517 5.573 -4 6.5v1a1 1 0 0 1 -1 1h-8a1 1 0 0 1 -1 -1v-1c-1.687 -1.054 -4 -5 -4 -6.5v-.5a1 1 0 0 1 1 -1z"></path>
                <path d="M12 4a2.4 2.4 0 0 0 -1 2a2.4 2.4 0 0 0 1 2"></path>
                <path d="M16 4a2.4 2.4 0 0 0 -1 2a2.4 2.4 0 0 0 1 2"></path>
                <path d="M8 4a2.4 2.4 0 0 0 -1 2a2.4 2.4 0 0 0 1 2"></path>
            </svg>
            <span
                class="absolute top-0 right-0 border-2  inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">
        {{ $count }}</span>
        </button>

    </x-slot>

    <x-slot name="content">
        {{--      <x-dropdown-link :href="route('profile.edit')">
                  {{ __('Profile') }}
              </x-dropdown-link>--}}

        <div class="flex flex-col p-4">
            <h4 class="text-primary uppercase font-semibold mb-2">
                Summary List
            </h4>
            @foreach($cartItems as $item)
                <div class="flex flex-row justify-between border-b border-primary py-2">
                    <div class="flex flex-col">
                        <span class="text-sm font-semibold tracking-wide text-gray-300 uppercase">
                            {{ $item->name }}
                        </span>
                        <span class="text-xs font-semibold tracking-wide text-gray-400 uppercase">
                            {{ $item->quantity }} * RF {{ number_format($item->price) }}
                        </span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm font-semibold tracking-wide text-gray-300 uppercase">
                          RF  {{ number_format($item->quantity * $item->price) }}
                        </span>
                    </div>
                </div>
            @endforeach
            <div class="flex flex-row justify-between  py-2">
                <div class="flex flex-col">
                    <span class="text-sm font-semibold tracking-wide text-primary uppercase">
                        Total:
                    </span>
                </div>
                <div class="flex flex-col">
                    <span class="text-sm font-bold tracking-wide text-primary uppercase">
                        RF {{ number_format($total) }}
                    </span>
                </div>
            </div>

            {{--            checkout button--}}
            <div class="inline-flex items-center justify-center w-full">
                <a href=""
                   class="flex-1 mt-6 px-4 py-2 text-sm font-semibold border-2 border-primary uppercase  rounded-l-sm hover:bg-primary text-white">
                    Edit List
                </a>

                <a href=""
                   class="flex-1 mt-6 px-4 py-2 text-sm font-semibold border-2 border-primary uppercase bg-primary rounded-r-sm hover:bg-primary hover:text-white">
                    Order Now
                </a>
            </div>

        </div>


    </x-slot>
</x-dropdown>
