<?php

namespace App\View\Components\client\cart;

use Illuminate\View\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class show extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $cart;
    public function __construct($cart = null)
    {
        if ($cart === null) {
            $cart =  Cart::instance('shopping')->content()->sortBy('id');
        }
        $this->cart = $cart;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.client.cart.show');
    }
}