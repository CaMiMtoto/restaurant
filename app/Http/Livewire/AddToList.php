<?php

namespace App\Http\Livewire;

use App\Models\Item;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AddToList extends Component
{
    public Item $item;

    public function mount(Item $item): void
    {
        $this->item = $item;
    }

    public function addToCart(): void
    {
        \Cart::add([
            'id' => $this->item->id,
            'name' => $this->item->name,
            'price' => $this->item->price,
            'quantity' => 1,
            'associatedModel' => $this->item,
        ]);
        $this->refreshCart();
    }

    public function refreshCart(): void
    {
        $this->emit('cartUpdated');
    }

    public function removeFromCart(): void
    {
        \Cart::remove($this->item->id);
        $this->refreshCart();
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $added = \Cart::get($this->item->id);
        return view('livewire.add-to-list', [
            'added' => $added,
        ]);
    }
}
