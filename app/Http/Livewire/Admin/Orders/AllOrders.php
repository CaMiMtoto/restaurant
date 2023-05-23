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
    protected $queryString = [
        'search' => ['except' => ''],
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
            ->latest()
            ->paginate(10);
        return view('livewire.admin.orders.all-orders', [
            'orders' => $orders,
        ]);
    }
}
