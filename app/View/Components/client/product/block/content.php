<?php

namespace App\View\Components\client\product\block;

use Illuminate\View\Component;

class content extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $content;
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.client.product.block.content');
    }
}
