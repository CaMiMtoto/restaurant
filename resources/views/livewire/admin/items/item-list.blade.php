<div class="container my-10">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-xl font-semibold">
            Manage Items
        </h1>
        <x-primary-button type="button"
                          x-data=""
                          x-on:click.prevent="$dispatch('open-modal', 'add-item')">
            <i class="fas fa-plus mr-2"></i>
            Add New
        </x-primary-button>
    </div>


    <div class="w-full md:max-w-7xl overflow-hidden bg-white rounded-lg md:shadow">
        <div class="relative overflow-x-auto rounded-lg">
            <div class="flex p-4 items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Items</h3>
                    <p class="text-sm font-medium text-gray-400">List of all items</p>
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
                                      class="block p-2 pl-10" wire:model="query"
                                      placeholder="Search..."/>
                    </div>
                </div>
            </div>

            <table class="w-full text-sm text-left text-gray-500" wire:loading.class="opacity-50">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>

                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Categories
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Is Special
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($items as $item)
                    <tr class="bg-white border-b hover:bg-gray-50" wire:key="tr{{$item->id}}">

                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                <img src="{{ $item->photo_thumbnail_url }}" alt="" class="w-10 h-10 rounded-full">
                                <div>
                                    {{ $item->name }}
                                </div>
                            </div>

                        </td>
                        <td class="px-6 py-4">
                            {{ number_format($item->price) }}
                        </td>
                        <td class="px-6 py-4">
                            @foreach($item->categories as $category)
                                <x-app-label class="capitalize">
                                    {{ $category->name }}
                                </x-app-label>
                            @endforeach
                        </td>
                        <td class="px-6 py-4">
                            <x-app-label color="{{ $item->is_special ? 'success' : 'danger' }}">
                                {{ $item->is_special ? 'Yes' : 'No' }}
                            </x-app-label>
                        </td>
                        <td class="px-6 py-4">
                            <x-app-label color="{{ $item->status=='available' ? 'success' : 'danger' }}"
                                         class="capitalize">
                                {{ $item->status }}
                            </x-app-label>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <button type="button"
                                        x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'edit-item')"
                                        wire:click="$emit('editItem', {{ $item->id }})"
                                        class="w-8 h-8 p-4 flex items-center justify-center rounded-full bg-primary/10 text-primary hover:bg-primary hover:text-white">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button"
                                        x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'delete-item')"
                                        wire:click="$emit('deleteItem', {{ $item->id }})"
                                        class="w-8 h-8 p-4 flex items-center justify-center rounded-full bg-red-700/10 text-red-600 hover:bg-red-600 hover:text-white">
                                    <i class="fas fa-trash"></i>
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

            @if($items->hasPages())
                <div class="p-4" >
                    {{ $items->links() }}
                </div>
            @endif


        </div>
    </div>

    <div wire:ignore>
        <livewire:admin.items.add-item/>
        <livewire:admin.items.edit-item/>
        <livewire:admin.items.delete-item/>
    </div>


</div>
