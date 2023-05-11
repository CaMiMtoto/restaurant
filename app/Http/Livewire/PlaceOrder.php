<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use Cart;
use DB;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Throwable;

class PlaceOrder extends Component
{
    public $customerName;
    public $customerPhone;
    public $customerEmail;
    public $note;
    protected $rules = [
        'customerName' => ['required', 'string', 'max:50'],
        'customerPhone' => ['required', 'string', 'max:20'],
        'customerEmail' => ['nullable', 'email', 'max:50'],
        'note' => ['nullable', 'string', 'max:255'],
    ];

    /**
     * @throws Throwable
     */
    public function submitOrder(): void
    {
        $this->validate();
        try {
            $cartItems = Cart::getContent();
            DB::beginTransaction();
            $order = Order::create([
                'customer_name' => $this->customerName,
                'customer_phone' => $this->customerPhone,
                'customer_email' => $this->customerEmail,
                'note' => $this->note,
                'delivery_address' => "Restaurant",
            ]);
            foreach ($cartItems as $item) {
                $order->orderItems()
                    ->create([
                        'item_id' => $item->id,
                        'qty' => $item->quantity,
                        'price' => $item->price,
                    ]);
            }
            DB::commit();
            Cart::clear();
            session()->flash('message', 'Order submitted successfully.');
            redirect()->route('welcome');
        } catch (Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Order submission failed.:' . $e->getMessage());
        }
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $cartItems = Cart::getContent();
        $total = Cart::getTotal();
        return view('livewire.place-order', [
            'cartItems' => $cartItems,
            'total' => $total
        ])
            ->layout('layouts.master');
    }
}
