<?php

namespace App\View\Components\admin\pagebuilder;

use Illuminate\View\Component;

class package extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $package;
    public $attr;
    public function __construct($package = null, $attr = "")
    {
        $this->package = $package;
        $this->attr = $attr;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.pagebuilder.package');
    }
}
