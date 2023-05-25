<x-modal name="delete-user" :show="$user">
    <div class="p-6">
        <h3 class="text-lg font-semibold text-gray-800">
            Delete User
        </h3>
        <p class="text-sm font-medium text-gray-400">
            Are you sure you want to delete this user?
        </p>

        <div class="mt-6">
            <x-alerts/>
        </div>

        <div class="mt-6 flex justify-end gap-4 ">
            @if($user)
                <x-primary-button wire:click.prevent="deleteUser">
                    Delete
                </x-primary-button>
            @endif
            <x-secondary-button x-on:click="$dispatch('close')">
                Cancel
            </x-secondary-button>
        </div>
    </div>
</x-modal>
