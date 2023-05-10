<?php

namespace App\Http\Livewire;

use Cart;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CartSummary extends Component
{
    protected $listeners = [
        'cartUpdated' => '$refresh',
    ];
    public function updateQuantity($id, $qty): void
    {
        Cart::update($id, [
            'quantity' => [
                'relative' => false,
                'value' => $qty,
            ],
        ]);
        $this->emit('cartUpdated');
    }

    public function removeItem($id): void
    {
        Cart::remove($id);
        $this->emit('cartUpdated');
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $cartItems = Cart::getContent()->sortBy(fn($item) => $item->name);
        $total = Cart::getTotal();
        return view('livewire.cart-summary', [
            'cartItems' => $cartItems,
            'total' => $total,
        ]);
    }
}
