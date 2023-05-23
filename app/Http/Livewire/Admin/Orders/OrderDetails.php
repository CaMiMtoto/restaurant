<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use App\Notifications\OrderStatusChangedNotification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class OrderDetails extends Component
{
    public ?Order $order;
    public $status;
    protected $listeners = ['orderSelected' => 'handleOrderSelected'];

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.admin.orders.order-details');
    }

    public function handleOrderSelected($id): void
    {
        $this->order = Order::with(['orderItems.item'])
            ->findOrFail($id);
        $this->status = $this->order->status;
    }

    public function updateStatus(): void
    {
        $order = $this->order;
        if ($this->status === $order->status || !in_array($this->status, Order::statuses())) {
            return;
        }

        $order->update(['status' => $this->status]);
        $this->emit('orderUpdated', $order->id);
        session()->flash('success', 'Order status updated successfully.');

        // notify customer about order status change via email
        if (is_null($order->customer_email))
            return;

        $order->notify(new OrderStatusChangedNotification($order));

    }
}
