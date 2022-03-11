<?php

namespace App\View\Components\admin\product;

use Illuminate\View\Component;

class item extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $prd ;
    public function __construct($prd)
    {
        $this->prd = $prd;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.product.item');
    }
}
