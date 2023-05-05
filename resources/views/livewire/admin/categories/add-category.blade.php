<x-modal :show="false" name="add-category" maxWidth="md" focusable>
    <div class="p-6">
        <h1 class="text-xl font-bold text-gray-900 ">
            Add Category
        </h1>
        <form wire:submit.prevent="save">

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Please fill in the field below to add an item category
            </p>
            <x-alerts/>

            <div>
                <x-input-label for="name" value="Name" class=""/>
                <x-text-input
                    id="name"
                    name="name"
                    type="text"
                    class="mt-1 block w-full"
                    placeholder="Category name"
                    wire:model="name"
                />
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>

            <div class="mt-6 flex justify-end gap-4">
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
