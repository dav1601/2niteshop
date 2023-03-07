<?php

namespace App\View\Components\admin\order;

use Illuminate\View\Component;

class select extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $ordered;
    public function __construct($ordered)
    {
        $this->ordered = $ordered;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.order.select');
    }
}
