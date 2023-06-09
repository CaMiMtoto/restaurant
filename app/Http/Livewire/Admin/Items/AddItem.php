<?php

namespace App\Http\Livewire\Admin\Items;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddItem extends Component
{
    use WithFileUploads;

    public $name = '';

    public $description = '';

    public $price = '';

    public $status = 'available';

    public $isSpecial = false;

    public $selectedCategories = [];

    public $photo;

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'description' => ['required', 'string'],
        'price' => ['required', 'numeric'],
        'selectedCategories' => ['required', 'array', 'min:1'],
        'selectedCategories.*' => ['required', 'integer', 'exists:categories,id'],
        'photo' => ['required', 'mimes:jpeg,jpg,png,webp,avif', 'max:1024'],
        'status' => ['required', 'string', 'in:available,unavailable'],
        'isSpecial' => ['nullable', 'boolean'],
    ];

    public $categories;

    public function mount(): void
    {
        $this->categories = Category::all();
    }

    public function save(): void
    {
        $this->validate();

        $item = Item::query()->create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'status' => $this->status,
            'is_special' => $this->isSpecial,
        ]);

        // attach model to media library
        $item->addMedia($this->photo->getRealPath())
            ->toMediaCollection('item-photos');

        $item->categories()->sync($this->selectedCategories);

        $this->emit('itemAdded', $item);

        session()->flash('success', 'Item added successfully.');

        $this->reset([
            'name',
            'description',
            'price',
            'selectedCategories',
            'photo',
        ]);
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.admin.items.add-item');
    }
}
