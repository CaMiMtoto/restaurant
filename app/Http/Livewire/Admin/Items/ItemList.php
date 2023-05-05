<?php

namespace App\Http\Livewire\Admin\Items;

use App\Models\Item;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ItemList extends Component
{
    protected $listeners = ['itemAdded' => '$refresh'];

    public string $query = '';

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $items = Item::query()
            ->withCount('categories')
            ->where('name', 'like', '%' . $this->query . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('livewire.admin.items.item-list', [
            'items' => $items
        ]);
    }
}
