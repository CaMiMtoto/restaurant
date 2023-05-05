<x-modal :show="$category" name="delete-category" maxWidth="md" focusable>
    <div class="p-6">
        <h1 class="text-xl font-bold text-gray-900 ">
            Delete Category
        </h1>
        <form wire:submit.prevent="deleteCategory">
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Are you sure you want to delete this category?
            </p>
            <x-alerts/>
            <div class="mt-6 flex justify-end gap-4">
                @if(!is_null($category))
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
