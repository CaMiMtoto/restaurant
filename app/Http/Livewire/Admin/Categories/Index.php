<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $listeners = ['categoryAdded' => '$refresh'];

    public string $query = '';

    public $selectedCategories = [];

    public function updatedSelectedCategories($value): void
    {
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {

        $categories = Category::query()
            ->withCount('items')
            ->where('name', 'like', '%'.$this->query.'%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.admin.categories.index', [
            'categories' => $categories,
        ]);
    }

    public function deleteCategory($id): void
    {
        $category = Category::find($id);
        $category->delete();
        $this->emit('categoryAdded');
    }

    public function deleteSelectedCategories()
    {
        Category::query()->whereIn('id', $this->selectedCategories)->delete();
        session()->flash('success', 'Categories deleted successfully.');
    }
}
