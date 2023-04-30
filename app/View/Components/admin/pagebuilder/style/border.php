<?php

namespace App\View\Components\admin\pagebuilder\style;

use Illuminate\View\Component;

class border extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $package;
    public function __construct($package)
    {
        $this->package = $package;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.pagebuilder.style.border');
    }
}
