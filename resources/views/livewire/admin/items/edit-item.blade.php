<x-modal :show="$item" name="edit-item" maxWidth="xl" focusable>
    <div class="p-6">
        <x-modal-title title="Edit Item"/>
        <form wire:submit.prevent="updateItem">
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Please fill in the field below to edit an item
            </p>



            <div class="mt-10 flex gap-4 items-end">
                <div class="flex-1">
                    <x-input-label for="photo" value="Photo" class=""/>
                    <input type="file" wire:model="photo" class="mt-2 w-full block border rounded-lg">
                    <x-input-error :messages="$errors->get('photo')" class="mt-2"/>
                </div>
                <div class="w-20">
                    @if ($photo)
                        <img src="{{ $photo->temporaryUrl() }}" class="h-14 w-14 object-cover border rounded-full"/>
                    @else
                        <img src="{{ $item->photo_thumbnail_url??'' }}"
                             class="h-14 w-14 object-cover border rounded-full"/>
                    @endif
                </div>
            </div>

            <div class="mt-6">
                <x-input-label for="name" value="Name" class=""/>
                <x-text-input
                    id="name"
                    name="name"
                    type="text"
                    class="mt-2 block w-full"
                    wire:model="name"
                />
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>

            <div class="flex items-end gap-4 flex-col sm:flex-row">
                <div class="mt-6">
                    <x-input-label for="price" value="Price" class=""/>
                    <x-text-input
                        id="price"
                        name="price"
                        type="number"
                        class="mt-2 block w-full"
                        wire:model="price"
                    />
                    <x-input-error :messages="$errors->get('price')" class="mt-2"/>
                </div>
                <div class="mt-6">
                    <div class="flex items-center my-2">
                        <input id="is_special" type="checkbox"
                               wire:model="isSpecial"
                               class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary  focus:ring-20">
                        <label for="is_special" class="sr-only">Is Special</label>
                        <label for="is_special" class="ml-2 text-sm text-gray-600 dark:text-gray-400">
                            Is Special
                        </label>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <x-input-label for="category" value="Category" class=""/>
                <div class="grid md:grid-cols-2">
                    @foreach($categories as $item)
                        <div class="flex items-center my-2">
                            <input id="edit-item-{{$item->id}}" type="checkbox"
                                   wire:model="selectedCategories"
                                   value="{{$item->id}}"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="edit-item-{{$item->id}}"
                                   class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ $item->name }}</label>
                        </div>
                    @endforeach
                </div>
                <x-input-error :messages="$errors->get('selectedCategories')" class="mt-2"/>
            </div>

            <div class="mt-6">
                <x-input-label for="description" value="Description" class=""/>
                <x-textarea-input wire:model="description" id="description" name="description"
                                  class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50"></x-textarea-input>
                <x-input-error :messages="$errors->get('description')" class="mt-2"/>
            </div>

            <div class="mt-6">
                <x-input-label for="status" value="Status" class=""/>
                <select wire:model="status" id="status" name="status"
                        class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50">
                    <option value="">Select Status</option>
                    <option value="available">Available</option>
                    <option value="unavailable">Unavailable</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2"/>
            </div>

            <x-alerts/>
            <div class="mt-6 flex justify-end gap-4">
                <x-primary-button type="submit" wire:loading.attr="disabled">
                    Save Changes
                    <x-spinner wire:loading.class.remove="hiding" class="hidden"/>
                </x-primary-button>
                <x-secondary-button x-on:click="$dispatch('close')">
                    Cancel
                </x-secondary-button>
            </div>
        </form>
    </div>
</x-modal>
