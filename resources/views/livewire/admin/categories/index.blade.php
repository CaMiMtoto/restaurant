<div class="container my-10">
    <div class="flex items-center justify-between mb-6">

        <div>
            <h3 class="text-lg font-semibold text-gray-800">Categories</h3>
            <p class="text-sm font-medium text-gray-400">List of all categories</p>
        </div>
        <x-primary-button type="button"
                          x-data=""
                          x-on:click.prevent="$dispatch('open-modal', 'add-category')">
            <i class="fas fa-plus mr-2"></i>
            Add New
        </x-primary-button>
    </div>

    <x-alerts/>


    <div class="w-full md:max-w-7xl overflow-hidden rounded-lg ">
        <div class="relative overflow-x-auto  rounded-lg bg-white">
            <div class="flex items-center justify-between  p-4 bg-white ">
                <div>
                    <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center bg-primary px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-50  hover:text-gray-50  focus:outline-none transition ease-in-out duration-150">
                                Actions
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                         viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link x-on:click.prevent="$dispatch('open-modal', 'add-category')">
                                <i class="fas fa-plus mr-2"></i>
                                Add New
                            </x-dropdown-link>
                            @if($selectedCategories)
                                <x-dropdown-link href="javascript:void(0);"
                                                 wire:click.prevent="deleteSelectedCategories">
                                    <i class="fas fa-trash mr-2"></i>
                                    Delete Selected
                                </x-dropdown-link>
                            @endif

                        </x-slot>
                    </x-dropdown>
                </div>
                <x-search-input wire:model="query"/>
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
                @foreach($categories as $item)
                    <tr class="bg-white border-b hover:bg-gray-50" wire:key="tr{{$item->id}}">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-{{$item->id}}" type="checkbox" wire:model="selectedCategories"
                                       value="{{ $item->id }}"
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
                            {{ $item->created_at->format('M d, Y') }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <button type="button"
                                        x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'edit-category')"
                                        wire:click="$emit('editCategory', {{ $item->id }})"
                                        class="w-8 h-8 flex items-center justify-center rounded-full bg-primary/10 text-primary hover:bg-primary hover:text-white">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button"
                                        x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'delete-category')"
                                        wire:click="$emit('deleteCategory', {{ $item->id }})"
                                        class="w-8 h-8 flex items-center justify-center rounded-full bg-red-700/10 text-red-600 hover:bg-red-700 hover:text-white">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <div class="p-4">
                {{ $categories->links() }}
            </div>

        </div>

    </div>


    <div wire:ignore>
        <livewire:admin.categories.add-category/>
        <livewire:admin.categories.edit-category/>
        <livewire:admin.categories.delete-category/>
    </div>

</div>
