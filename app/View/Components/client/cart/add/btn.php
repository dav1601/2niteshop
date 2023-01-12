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
    public $ajax;
    public $custom;
    public function __construct($product, $options = "", $ajax = 0, $custom = ["qty" => 1])
    {
        $this->product = $product;
        $this->options = $options;
        $this->ajax = $ajax;
        $this->custom = $custom;
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
