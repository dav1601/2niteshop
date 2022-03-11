<?php

namespace App\View\Components\client\account\address;

use Illuminate\View\Component;

class item extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $address;
    public function __construct($address)
    {
        $this->address = $address;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.client.account.address.item');
    }
}
