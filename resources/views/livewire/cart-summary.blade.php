<div

    class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">

    <div style="display: none" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" x-show="openSummary"></div>

    <div style="display: none" class="fixed inset-0 overflow-hidden" x-show="openSummary"
         x-transition:enter="transition transform ease-in-out duration-300"
         x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
         x-transition:leave="transition transform ease-in-out duration-500" x-transition:leave-start="translate-x-0"
         x-transition:leave-end="translate-x-full">
        <div class="absolute inset-0 overflow-hidden">
            <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                <div class="pointer-events-auto w-screen max-w-md">
                    <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl" @click.outside="openSummary=false" @close.stop="openSummary = false">
                        <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                            <div class="flex items-start justify-between ">
                                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                                    Items Summary
                                </h2>
                                <div class="ml-3 flex h-7 items-center">
                                    <button type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500"
                                            x-on:click="openSummary=false">
                                        <span class="sr-only">Close panel</span>
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                             stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="mt-8">
                                <div class="flow-root">
                                    <ul role="list" class="-my-6 divide-y divide-gray-200">
                                        @forelse($cartItems as $item)
                                            <li class="flex py-6" wire:key="item_{{$item->id}}">
                                                <div
                                                    class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-sm border border-gray-200">
                                                    <img
                                                        src="{{ $item->associatedModel->photo_thumbnail_url }}"
                                                        alt=" {{ $item->name }}"
                                                        class="h-full w-full object-cover object-center">
                                                </div>

                                                <div class="ml-4 flex flex-1 flex-col">
                                                    <div>
                                                        <div
                                                            class="flex justify-between text-base font-medium text-gray-900">
                                                            <h3>
                                                                <a href="#">
                                                                    {{ $item->name }}
                                                                </a>
                                                            </h3>
                                                            <p class="ml-4">
                                                                RF {{ number_format($item->price*$item->quantity) }}
                                                            </p>
                                                        </div>
                                                        <p class="mt-1 text-sm text-gray-500">
                                                            Qty {{ $item->quantity }}</p>
                                                    </div>
                                                    <div class="flex flex-1 items-end justify-between text-sm">
                                                        <div>
                                                            <x-input-label for="quantity" label="Quantity"
                                                                           value="Quantity" class="sr-only"/>
                                                            <select id="quantity"
                                                                    wire:change="updateQuantity({{ $item->id }}, $event.target.value)"
                                                                    class="w-16 rounded-sm shadow-sm border border-gray-300 py-1.5">
                                                                @for($i = 1; $i <= 10; $i++)
                                                                    <option value="{{ $i }}"
                                                                        {{ $item->quantity  == $i ? 'selected' : '' }}
                                                                    >{{ $i }}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <div class="flex">
                                                            <button type="button"
                                                                    wire:click="removeItem({{ $item->id }})"
                                                                    class="font-semibold text-red-600 hover:text-red-500">
                                                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                                                     stroke-width="1.5"
                                                                     stroke="currentColor" aria-hidden="true">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                          d="M6 18L18 6M6 6l12 12"/>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @empty
                                            <li>
                                                <div
                                                    class="flex justify-between text-base font-semibold text-red-700 bg-red-100  px-6 py-4 rounded mt-10">
                                                    No items in you list yet.
                                                </div>
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                            <div class="flex justify-between text-base font-medium text-gray-900">
                                <p>Total:</p>
                                <p class="font-semibold text-2xl">
                                    RF {{ number_format($total) }}
                                </p>
                            </div>
                            @if($cartItems->count()>0)
                                <p class="mt-0.5 text-sm text-gray-500">
                                    You will be charged for this amount.
                                </p>
                                <div class="mt-6">
                                    <a href="#"

                                       class="flex items-center justify-center rounded-sm border border-transparent bg-primary px-6 py-2 text-base font-medium text-white shadow-sm hover:bg-primary/80">
                                        Place Order
                                    </a>
                                </div>
                            @endif
                            <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                <p>
                                    or
                                    <button type="button" @click="openSummary=false"
                                            class="font-semibold tracking-wider text-primary hover:text-amber-500">
                                        Continue Exploring
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
