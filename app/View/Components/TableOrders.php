<?php

namespace App\View\Components;

use Illuminate\View\Component;

class tableorders extends Component
{
    public $order;
    public $page;
    public $number;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($order , $number , $page)
    {
        $this->order = $order;
        $this->number = $number;
        $this->page = $page;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tableorders');
    }
}
