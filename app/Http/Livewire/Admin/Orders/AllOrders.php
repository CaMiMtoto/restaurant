<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class AllOrders extends Component
{
    use WithPagination;

    protected $listeners = ['orderUpdated' => '$refresh'];

    public $search = '';
    public $selectedFilter = 'all';

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingSelectedFilter(): void
    {
        $this->resetPage();
    }

    protected $queryString = [
        'search' => ['except' => ''],
        'selectedFilter' => ['except' => ''],
    ];

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $orders = Order::query()
            ->with('orderItems')
            ->when($this->search, function ($query) {
                $query->where('customer_name', 'like', '%' . $this->search . '%')
                    ->orWhere('customer_email', 'like', '%' . $this->search . '%')
                    ->orWhere('customer_phone', 'like', '%' . $this->search . '%')
                    ->orWhere('status', 'like', '%' . $this->search . '%');
            })
            ->when($this->selectedFilter !== 'all', function ($query) {
                $query->where('status', $this->selectedFilter);
            })
            ->latest()
            ->paginate(10);
        return view('livewire.admin.orders.all-orders', [
            'orders' => $orders,
        ]);
    }
}
