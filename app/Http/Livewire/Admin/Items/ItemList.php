<?php

namespace App\Http\Livewire\Admin\Items;

use App\Models\Item;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ItemList extends Component
{
    use WithPagination;

    public $perPage = 10;

    protected $listeners = ['itemAdded' => '$refresh'];

    public string $query = '';

    protected $queryString = [
        'query' => ['except' => ''],
    ];

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {

        $items = Item::query()
            ->with('categories')
            ->where('name', 'like', '%'.$this->query.'%')
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.admin.items.item-list', [
            'items' => $items,
        ]);
    }
}
