<?php

namespace App\View\Components;

use Illuminate\View\Component;

class cartsub extends Component
{
    public $type;
    /**
     * The alert message.
     *
     * @var string
     */
    public $cartsub;

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct($cartsub)
    {
        $this->cartsub = $cartsub;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cartsub');
    }
}
