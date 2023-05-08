<x-modal :show="false" name="add-item" focusable>
    <div
        x-data="{ isUploading: false, progress: 0 }"
        x-on:livewire-upload-start="isUploading = true"
        x-on:livewire-upload-finish="isUploading = false"
        x-on:livewire-upload-error="isUploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress"
        class="p-6">
        <x-modal-title title="Add Item"/>
        <form wire:submit.prevent="save">

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Please fill in the information below.
            </p>

            <div class="mt-10 flex gap-4 items-end">
                <div class="flex-1">
                    <x-input-label for="photo" value="Photo" class=""/>
                    <input type="file" wire:model="photo" class="mt-2 w-full block border rounded-lg">
                    {{--   <!-- Progress Bar -->
                       <div x-show="isUploading">
                           <progress max="100" x-bind:value="progress"></progress>
                       </div>--}}
                    <x-input-error :messages="$errors->get('photo')" class="mt-2"/>

                </div>
                <div class="w-20">
                    @if ($photo)
                        <img src="{{ $photo->temporaryUrl() }}" class="h-14 w-14 object-cover border rounded-full"/>
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
                <x-input-label for="category" value="Categories" class=""/>
                <div class="grid md:grid-cols-2">
                    @foreach($categories as $item)
                        <div class="flex items-center my-2">
                            <input id="checkbox-{{$item->id}}" type="checkbox"
                                   wire:model="selectedCategories"
                                   value="{{$item->id}}"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-{{$item->id}}"
                                   class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ $item->name }}</label>
                        </div>
                    @endforeach
                </div>
                <x-input-error :messages="$errors->get('selectedCategories')" class="mt-2"/>
            </div>
            <div class="mt-6">
                <x-input-label for="description" value="Description" class=""/>
                <x-textarea-input
                    id="description"
                    name="description"
                    type="text"
                    class="mt-2 block w-full"
                    wire:model="description"
                />
                <x-input-error :messages="$errors->get('description')" class="mt-2"/>
            </div>

            <div class="mt-6">
                <x-input-label for="status" value="Status" class=""/>
                <select id="status" name="status" wire:model="status"
                        class="mt-2 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                    <option value="">Select Status</option>
                    <option value="available">Available</option>
                    <option value="unavailable">Unavailable</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2"/>
            </div>

            <x-alerts/>

            <div class="mt-6 flex justify-end gap-4 ">
                <x-primary-button type="submit">
                    Save Changes
                </x-primary-button>
                <x-secondary-button x-on:click="$dispatch('close')">
                    Cancel
                </x-secondary-button>
            </div>
        </form>
    </div>
</x-modal>
