<div>
    <div class="pb-10 bg-center bg-cover" id="header"
         style="background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url({{ asset('img/home/chefs-bg.jpg') }})">
        <x-partials._top_nav/>
        <h1 class="md:text-4xl font-semibold text-center text-white uppercase tracking-wider">
            Contact Information
        </h1>
    </div>
    <div class="container px-10 py-10 mx-auto max-w-7xl">
        <h1 class="text-2xl font-semibold">
            Contact Information
        </h1>

        <div class="grid md:grid-cols-2 mb-10">

            <form autocomplete="off" wire:submit.prevent="submitOrder">
                <div class="mt-6">
                    <x-alerts/>
                </div>
                <div class="mt-6">
                    <x-input-label for="name" value="Name" class="mb-3"/>
                    <x-text-input id="name" wire:model="customerName"
                                  class="py-3 px-3  bg-white w-full {{ $errors->has('customerName')?'border-red-500 border-2':'' }}"
                                  placeholder="Enter your name"/>
                    <x-input-error for="customerName" class="mt-1" :messages="$errors->get('customerName')"/>
                </div>
                <div class="mt-6">
                    <x-input-label for="phone" value="Phone" class="mb-3"/>
                    <x-text-input id="phone" wire:model="customerPhone"
                                  class="py-3 px-3  bg-white w-full {{ $errors->has('customerPhone')?'border-red-500 border-2':'' }}"
                                  placeholder="Phone number"/>
                    <x-input-error for="customerPhone" class="mt-1" :messages="$errors->get('customerPhone')"/>

                </div>
                <div class="mt-6">
                    <x-input-label for="email" value="Email" class="mb-3"/>
                    <x-text-input type="email" id="email" wire:model="customerEmail"
                                  class="py-3 px-3 bg-white w-full {{ $errors->has('customerEmail')?'border-red-500 border-2':'' }}"
                                  placeholder="Email"/>
                    <x-input-error for="customerEmail" class="mt-1" :messages="$errors->get('customerEmail')"/>
                </div>
                <div class="mt-6">
                    <x-input-label for="note" value="Note" class="mb-3"/>
                    <x-textarea-input id="note" wire:model="note"
                                      class="py-3 px-3  shadow-sm bg-white w-full {{ $errors->has('note')?'border-red-500 border-2':'' }}"
                                      placeholder="Anything to let us know?"></x-textarea-input>
                    <x-input-error for="note" class="mt-1" :messages="$errors->get('note')"/>
                </div>

                <div class="mt-6">
                    <button
                        type="submit" wire:loading.attr="disabled"
                        class="px-8 py-3 mt-10 block w-full border-2 rounded-md border-primary hover:text-primary font-semibold bg-primary hover:bg-white ">
                        Submit Order
                    </button>
                </div>
            </form>
            <div class="md:px-10 mt-14">
                <div
                    class="w-full sticky top-10 p-4 bg-white border border-gray-200 rounded-md shadow-sm sm:p-8">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-xl font-bold leading-none text-gray-900">
                            Order Summary
                        </h5>
                    </div>
                    <div class="flow-root">
                        <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach($cartItems as $item)
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm text-gray-700 truncate">
                                                {{ $item->name }}
                                            </p>
                                        </div>
                                        <div
                                            class="inline-flex items-center text-base font-semibold text-gray-900">
                                            {{ number_format($item->quantity * $item->price) }}
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            <li class="py-3">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-1 min-w-0">
                                        <p class="text-lg font-semibold text-gray-900">Order Total</p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900">
                                        {{ number_format($total) }}
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
