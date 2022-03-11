<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Cart extends Component
{
    public $type;
    /**
     * The alert message.
     *
     * @var string
     */
    public $cart;

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct($cart)
    {
        $this->cart = $cart;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cart');
    }
}
