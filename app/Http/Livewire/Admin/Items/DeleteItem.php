<?php

namespace App\Http\Livewire\Admin\Items;

use App\Models\Item;
use Livewire\Component;

class DeleteItem extends Component
{
    public $item;

    protected $listeners = ['deleteItem' => 'findItem'];

    public function deleteItem(): void
    {
        try {
            $prevItem = $this->item;
            $this->item->delete();
            $prevItem->clearMediaCollection('item-photo');
            session()->flash('success', 'Item deleted successfully.');
            $this->item = null;
            $this->emit('itemAdded');
            $this->dispatchBrowserEvent('close-modal', 'delete-item');
        } catch (\Exception $e) {
            session()->flash('error', 'Item cannot be deleted. Maybe it is associated with some orders.');
        }
    }

    public function findItem($id): void
    {
        $this->item = Item::query()->find($id);
    }

    public function render()
    {
        return view('livewire.admin.items.delete-item');
    }
}
