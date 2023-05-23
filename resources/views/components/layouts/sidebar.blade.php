<div id="sidebar" {{ $attributes->class(['w-80 bg-white min-h-screen p-4 border-r hidden']) }} x-transition>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-semibold text-gray-900">
            {{ config('app.name') }}
        </h2>

    </div>
    <div class="mt-8 flex items-center">
        <img class="w-16 h-16 rounded-full" src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}"/>
        <div class="ml-4">
            <div class="font-medium text-base text-gray-800">
                {{ auth()->user()->name }}
            </div>
            <div class="mt-1">
                <span href="#" class="text-gray-600 hover:text-gray-900">
                    {{ auth()->user()->email }}
                </span>
            </div>
        </div>
    </div>
    <ul class="mt-8 flex flex-col gap-3">
        <x-sidebar-link title="Dashboard" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"
                        icon="dashboard"/>
        <x-sidebar-link title="Categories" :href="route('categories.index')"
                        :active="request()->routeIs('categories.index')" icon="list"/>
        <x-sidebar-link title="Menus" :href="route('items.index')"
                        :active="request()->routeIs('items.index')" icon="book"/>
        <x-sidebar-link title="Reservations" icon="utensils" :href="route('reservations.index')"
                        :active="request()->routeIs('reservations.index')"/>
        <x-sidebar-link title="Orders" icon="burger" :href="route('orders.index')"
                        :active="request()->routeIs('orders.index')"/>
        <x-sidebar-link title="Messages" icon="message"/>
        <x-sidebar-link title="Gallery" icon="image"/>
        <x-sidebar-link title="Newsletters" icon="square-rss"/>
    </ul>
</div>
