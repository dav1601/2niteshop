<?php

namespace App\View\Components\client\cart\add;

use Illuminate\View\Component;

class btn extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $product;
    public $options;
    public function __construct($product, $options = "")
    {
        $this->product = $product;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.client.cart.add.btn');
    }
}
