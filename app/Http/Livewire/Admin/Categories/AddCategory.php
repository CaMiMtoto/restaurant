<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AddCategory extends Component
{

    public string $name = '';

    public function save(): void
    {
        $this->validate([
            'name' => 'required|unique:categories,name'
        ]);

        $category = new Category();
        $category->name = $this->name;
        $category->save();

        session()->flash('success', 'Category has been created successfully!');
        $this->emit('categoryAdded', $category);
        $this->reset();
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.admin.categories.add-category');
    }
}
