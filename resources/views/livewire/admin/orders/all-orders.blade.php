<div class="container my-10">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-xl font-semibold">
            Manage Orders
        </h1>
        <x-primary-button type="button"
                          x-data=""
                          x-on:click.prevent="$dispatch('open-modal', 'add-order')">
            <i class="fas fa-plus mr-2"></i>
            Add New
        </x-primary-button>
    </div>


    <div class="w-full md:max-w-7xl overflow-hidden bg-white rounded-lg md:shadow">
        <div class="relative overflow-x-auto rounded-lg">
            <div class="flex p-4 items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">
                        Orders
                    </h3>
                    <p class="text-sm font-medium text-gray-400">
                        List of all orders
                    </p>
                </div>
                <div>
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <x-text-input type="text" id="table-search-users"
                                      class="block p-2 pl-10" wire:model="search"
                                      placeholder="Search..."/>
                    </div>
                </div>
            </div>

            <table class="w-full text-sm text-left text-gray-500" wire:loading.class="opacity-50">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">Customer Name</th>
                    <th scope="col" class="px-6 py-3">Customer Phone</th>
                    <th scope="col" class="px-6 py-3">Price</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($orders as $item)
                    <tr class="bg-white border-b hover:bg-gray-50" wire:key="tr{{$item->id}}">
                        <td class="px-6 py-4">
                            {{ $item->customer_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->customer_phone }}
                        </td>
                        <td class="px-6 py-4">
                            {{ number_format($item->total) }}
                        </td>
                        <td class="px-6 py-4">
                            <x-app-label :color="$item->statusColor" class="capitalize">
                                {{ $item->status }}
                            </x-app-label>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <button type="button"
                                        x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'order-details')"
                                        wire:click="$emit('orderSelected', {{ $item->id }})"
                                        class="px-4 py-1.5 font-semibold flex items-center justify-center rounded-md bg-primary/20 text-gray-900 hover:bg-primary hover:text-white">
                                    Details
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-white ">
                        <td colspan="7" class="px-6 py-4 text-center">
                            <x-alert-info message="No items found"/>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            @if($orders->hasPages())
                <div class="p-4">
                    {{ $orders->links() }}
                </div>
            @endif

        </div>
    </div>

    <div wire:ignore>
        <livewire:admin.orders.order-details/>
    </div>

</div>
