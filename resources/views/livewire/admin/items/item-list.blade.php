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


    <div class="w-full md:max-w-7xl overflow-hidden rounded-lg ">
        <div class="relative overflow-x-auto  rounded-lg">
            <div class="flex items-center justify-between  p-4 bg-white ">
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
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Items
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created At
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr class="bg-white border-b hover:bg-gray-50" wire:key="tr{{$item->id}}">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-{{$item->id}}" type="checkbox"
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-{{$item->id}}" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->items_count }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->created_at }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <button type="button"
                                        class="w-10 h-10 flex items-center justify-center rounded-full bg-primary/10 text-primary">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button"
                                        class="w-10 h-10 flex items-center justify-center rounded-full bg-red-700/10 text-red-600">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

    </div>


    <livewire:admin.items.add-item/>
    <livewire:admin.items.edit-item/>
    <livewire:admin.items.delete-item/>


</div>
