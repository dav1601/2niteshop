<?php

namespace App\View\Components\product;

use Illuminate\View\Component;

class block extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $blocks;
    public function __construct($blocks)
    {
        $this->blocks = $blocks;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product.block');
    }
}
