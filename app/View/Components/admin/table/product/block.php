<?php

namespace App\View\Components\admin\table\product;

use Illuminate\View\Component;

class block extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $vadata;
    public function __construct($vadata)
    {
        $this->vadata = $vadata;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.table.product.block');
    }
}
