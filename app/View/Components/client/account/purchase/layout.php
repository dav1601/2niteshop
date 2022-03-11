<?php

namespace App\View\Components\client\account\purchase;

use Illuminate\View\Component;

class layout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $type;
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.client.account.purchase.layout');
    }
}
