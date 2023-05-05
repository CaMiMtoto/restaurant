<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class DeleteCategory extends Component
{
    public $category;

    protected $listeners = ['deleteCategory' => 'findCategory'];

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.admin.categories.delete-category');
    }

    public function findCategory($id): void
    {
        $this->category = Category::query()->find($id);
    }

    public function deleteCategory(): void
    {
        $this->category->delete();
        session()->flash('success', 'Category deleted successfully.');
        $this->category = null;
        $this->emit('categoryAdded');
        $this->dispatchBrowserEvent('close-modal', 'add-category');
    }
}
