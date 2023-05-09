<div>
    @if($added)
        <button type="button"
                wire:click="removeFromCart" wire:loading.attr="disabled"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold border-2 border-primary uppercase bg-primary rounded-0  self-start hover:bg-primary hover:text-white">
            Remove from list
        </button>
    @else
        <button type="button"
                wire:click="addToCart" wire:loading.attr="disabled"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold border-2 border-primary uppercase bg-white rounded-0  self-start hover:bg-primary hover:text-white">
            Add to list
        </button>
    @endif

</div>
