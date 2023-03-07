<?php

namespace App\View\Components\cart\purchase;

use Illuminate\View\Component;

class content extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type;
    public $kw;
    public function __construct($type = 0, $kw = null)
    {
        $this->type = $type;
        $this->kw = $kw;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cart.purchase.content');
    }
}
