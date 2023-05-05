<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class EditCategory extends Component
{
    protected $listeners = ['editCategory' => 'edit'];

    public $category;

    public string $name = '';

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        info("name" . $this->name);
        return view('livewire.admin.categories.edit-category');
    }

    public function edit($id): void
    {
        $this->category = Category::query()->find($id);
        $this->name = $this->category->name;
    }

    public function updateCategory(): void
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $this->category->update([
            'name' => $this->name,
        ]);

        session()->flash('success', 'Category updated successfully.');

        $this->emit('categoryAdded');
    }
}
