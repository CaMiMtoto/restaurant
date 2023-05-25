<x-modal name="add-user" max-width="sm">
    <div class="p-6">
        <h3 class="text-lg font-semibold text-gray-800">
            Add New User
        </h3>
        <p class="text-sm font-medium text-gray-400">
            Fill the form below to add a new user
        </p>

        <div class="mt-6">
            <x-alerts/>
        </div>

        <form wire:submit.prevent="submit">
            <div class="mt-6">
                <x-input-label for="name" value="Name" class="w-full mb-3"/>
                <x-text-input id="name" placeholder="Enter name" wire:model="name" class="py-2 px-3 w-full"/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>

            </div>

            <div class="mt-6">
                <x-input-label for="email" value="Email" class="w-full mb-3"/>
                <x-text-input id="email" placeholder="Enter email" wire:model="email" class="py-2 px-3 w-full"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2"/>

            </div>

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
