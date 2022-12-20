<?php

namespace App\View\Components\client\product\block;

use Illuminate\View\Component;

class module extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $contents;
    public function __construct($contents)
    {
        $this->contents = $contents;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.client.product.block.module');
    }
}
