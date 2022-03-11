<?php

namespace App\View\Components\header;

use Illuminate\View\Component;

class bottom extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $name;
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header.bottom');
    }
}
