<?php

namespace App\Http\Livewire\Admin\Items;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditItem extends Component
{
    use WithFileUploads;

    public $item;
    public $name = '';
    public $description = '';
    public $price = '';
    public $status = 'available';
    public $isSpecial = false;
    public $selectedCategories = [];
    public $photo;

    protected $listeners = ['editItem' => 'edit'];

    public function mount(): void
    {
        $this->categories = Category::all();
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.admin.items.edit-item');
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'selectedCategories' => ['required', 'array', 'min:1'],
            'selectedCategories.*' => ['required', 'integer', 'exists:categories,id'],
            'photo' => ['nullable', 'image', 'max:1024'],
            'status' => ['required', 'string', 'in:available,unavailable'],
            'isSpecial' => ['nullable', 'boolean']
        ];
    }

    public function updateItem(): void
    {
        $this->validate();

        $this->item->update([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'status' => $this->status,
            'is_special' => $this->isSpecial,
        ]);

        if ($this->photo) {
            if ($this->item->getFirstMedia('item-photos'))
                $this->item->getFirstMedia('item-photos')->delete();

            $this->item->addMedia($this->photo->getRealPath())
                ->toMediaCollection('item-photos');
        }

        $this->item->categories()->sync($this->selectedCategories);

        session()->flash('success', 'Item updated successfully.');
        $this->reset([
            'photo'
        ]);
        $this->emit('itemAdded');
    }

    public function edit($id): void
    {
        $this->item = Item::query()->findOrFail($id);
//        dd($this->item);
        $this->name = $this->item->name;
        $this->description = $this->item->description;
        $this->price = $this->item->price;
        $this->status = $this->item->status;
        $this->isSpecial = $this->item->is_special;
        $this->selectedCategories = $this->item->categories->pluck('id')->toArray();

    }


}
