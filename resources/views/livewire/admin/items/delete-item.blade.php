<x-modal name="delete-item" :show="$item" maxWidth="md">
    <div class="p-6">
        <h1 class="text-xl font-bold text-gray-900 ">
            Delete Item
        </h1>
        <form wire:submit.prevent="deleteItem">
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Are you sure you want to delete this item?
            </p>
            <x-alerts/>
            <div class="mt-6 flex justify-end gap-4">
                @if(!is_null($item))
                    <x-primary-button type="submit">
                        Yes, Delete
                    </x-primary-button>
                @endif
                <x-secondary-button x-on:click="$dispatch('close')">
                    Cancel
                </x-secondary-button>
            </div>
        </form>
    </div>
</x-modal>
