<?php

namespace App\View\Components\admin\table;

use Illuminate\View\Component;

class preorders extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $customers;
    public $page;
    public $number;
    public function __construct($customers , $number , $page)
    {
        $this->customers = $customers;
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
        return view('components.admin.table.preorders');
    }
}
