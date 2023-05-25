<div class="container my-10">
    <div class="flex items-center justify-between mb-4">
        <div>
            <h3 class="text-lg font-semibold text-gray-800">
                Users
            </h3>
            <p class="text-sm font-medium text-gray-400">
                List of all users
            </p>
        </div>
        <x-primary-button type="button"
                          x-data=""
                          x-on:click.prevent="$dispatch('open-modal', 'add-user')">
            <i class="fas fa-plus mr-2"></i>
            Add New
        </x-primary-button>
    </div>


    <div class="w-full md:max-w-7xl overflow-hidden bg-white rounded-lg md:shadow">
        <div class="relative overflow-x-auto rounded-lg">
            <div class="flex p-4 items-center justify-between">
                <div></div>
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
                    <th scope="col" class="px-6 py-3">Image</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $item)
                    <tr class="bg-white border-b hover:bg-gray-50" wire:key="tr{{$item->id}}">
                        <td class="px-6 py-4">
                            <img class="w-8 h-8 rounded-full" src="{{ $item->getProfilePhotoUrlAttribute() }}"
                                 alt="{{ $item->name }}">
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->email }}
                        </td>
                        <td class="px-6 py-4">
                            <x-app-label :color="$item->status=='active'?'success':'danger'"
                                         class="capitalize rounded-full">
                                {{ $item->status }}
                            </x-app-label>
                        </td>
                        <td class="py-4">
                            <x-dropdown align="right" width="44">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-gray-200 text-sm leading-4 font-medium rounded-sm bg-gray-100 text-gray-800 focus:outline-none transition ease-in-out duration-150 hover:bg-gray-50">
                                        <div class="font-semibold">
                                            Option
                                        </div>
                                        <div class="ml-1">
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">

                                    <x-dropdown-link href="" wire:click.prevent="" class="font-semibold">
                                        <i class="fas fa-shield-halved"></i>
                                        Permissions
                                    </x-dropdown-link>
                                    <x-dropdown-link href="" wire:click.prevent="" class="font-semibold">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </x-dropdown-link>
                                    <x-dropdown-link href=""
                                                     x-data=""
                                                     x-on:click.prevent="$dispatch('open-modal', 'delete-user')"
                                                     wire:click="$emit('userSelected', {{ $item->id }})"
                                                     class="font-semibold">
                                        <i class="fas fa-trash"></i>
                                        Delete
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
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

            @if($users->hasPages())
                <div class="p-4">
                    {{ $users->links() }}
                </div>
            @endif

        </div>
    </div>

    <div wire:ignore>
        <livewire:admin.user-manager.create-form/>
        <livewire:admin.user-manager.update-form/>
        <livewire:admin.user-manager.delete-form/>
    </div>

</div>
