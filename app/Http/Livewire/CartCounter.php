<?php

namespace App\Http\Livewire;

use Cart;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CartCounter extends Component
{
    protected $listeners = [
        'cartUpdated' => '$refresh',
    ];

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $cartItems = Cart::getContent();
        $total = Cart::getTotal();
        return view('livewire.cart-counter', [
            'count' => $cartItems->count(),
            'cartItems' => $cartItems,
            'total' => $total,
        ]);
    }
}
